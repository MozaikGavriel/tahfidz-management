@extends('admin.layout')

@section('content')
<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title text-white">Detail Kartu Laporan</h4>
                <div class="ms-auto text-end">
                    <a href="{{ route('report-cards.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left me-1"></i> Kembali
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card shadow-lg">
                    <div class="card-body">
                        <!-- PDF Preview Section -->
                        <div class="mb-4">
                            <div id="pdf-preview" class="border rounded p-3" style="height: 600px; overflow: auto;">
                                <div class="text-center py-5">
                                    <div class="spinner-border text-primary" role="status">
                                        <span class="visually-hidden">Loading...</span>
                                    </div>
                                    <p class="mt-2">Memuat PDF...</p>
                                </div>
                            </div>
                        </div>

                        <!-- PDF Controls -->
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <div>
                                <button id="prev-page" class="btn btn-secondary">
                                    <i class="fas fa-chevron-left"></i> Sebelumnya
                                </button>
                                <button id="next-page" class="btn btn-secondary">
                                    Berikutnya <i class="fas fa-chevron-right"></i>
                                </button>
                            </div>
                            <div>
                                <span>Halaman: <span id="page-num"></span> / <span id="page-count"></span></span>
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="text-end">
                            <a href="{{ route('report-cards.generate', $reportCard->id) }}" class="btn btn-primary" target="_blank">
                                <i class="fas fa-print me-1"></i>Cetak PDF
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- PDF.js Library -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.6.347/pdf.min.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const pdfUrl = "{{ route('report-cards.generate', $reportCard->id) }}";
        const pdfPreview = document.getElementById('pdf-preview');
        const pageNum = document.getElementById('page-num');
        const pageCount = document.getElementById('page-count');
        const prevPage = document.getElementById('prev-page');
        const nextPage = document.getElementById('next-page');

        let pdfDoc = null,
            pageNumVal = 1,
            pageRendering = false,
            pageNumPending = null;

        const scale = 1.5;

        function renderPage(num) {
            pageRendering = true;
            pdfDoc.getPage(num).then(function(page) {
                const viewport = page.getViewport({ scale });
                const canvas = document.createElement('canvas');
                const context = canvas.getContext('2d');
                canvas.height = viewport.height;
                canvas.width = viewport.width;

                pdfPreview.innerHTML = '';
                pdfPreview.appendChild(canvas);

                const renderContext = {
                    canvasContext: context,
                    viewport: viewport
                };

                page.render(renderContext).promise.then(function() {
                    pageRendering = false;
                    if (pageNumPending !== null) {
                        renderPage(pageNumPending);
                        pageNumPending = null;
                    }
                });

                pageNum.textContent = num;
            });
        }

        function queueRenderPage(num) {
            if (pageRendering) {
                pageNumPending = num;
            } else {
                renderPage(num);
            }
        }

        function onPrevPage() {
            if (pageNumVal <= 1) return;
            pageNumVal--;
            queueRenderPage(pageNumVal);
        }

        function onNextPage() {
            if (pageNumVal >= pdfDoc.numPages) return;
            pageNumVal++;
            queueRenderPage(pageNumVal);
        }

        // Initialize PDF.js
        pdfjsLib.getDocument(pdfUrl).promise.then(function(pdfDoc_) {
            pdfDoc = pdfDoc_;
            pageCount.textContent = pdfDoc.numPages;
            renderPage(pageNumVal);
        });

        // Event Listeners
        prevPage.addEventListener('click', onPrevPage);
        nextPage.addEventListener('click', onNextPage);
    });
</script>

<style>
    .page-wrapper {
        margin-top: -70px;
        background: linear-gradient(45deg, #1a535c, #0d2e33);
        min-height: 100vh;
        padding: 20px;
    }

    .card {
        border-radius: 15px;
        box-shadow: 0 4px 6px rgba(0,0,0,0.1);
    }

    .table {
        border-radius: 10px;
        overflow: hidden;
    }

    th {
        background-color: #1a535c;
        color: white;
        font-weight: 600;
    }

    .btn-primary {
        background: linear-gradient(45deg, #37acbe, #0d2e33);
        border: none;
    }

    .btn-primary:hover {
        background: linear-gradient(45deg, #0d2e33, #37acbe);
    }

    .signature {
        margin-top: 30px;
        padding: 20px;
        background: #f8f9fa;
        border-radius: 10px;
    }

    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap');

    #pdf-preview {
        background: #f8f9fa;
        border: 1px solid #dee2e6;
    }

    .btn-secondary {
        background: linear-gradient(45deg, #6c757d, #495057);
        border: none;
    }

    .btn-secondary:hover {
        background: linear-gradient(45deg, #495057, #6c757d);
    }
</style>
@endsection
