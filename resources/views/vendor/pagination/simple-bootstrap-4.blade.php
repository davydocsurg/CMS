{{-- @extends('layouts.front') --}}

@if ($paginator->hasPages())
    <nav class="">
        <ul class="pagination ">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="page-item disabled shadow-lg" aria-disabled="true">
                    <span class="page-link">@lang('pagination.previous')</span>
                </li>
            @else
                <li class="page-item shadow-lg">
                    <a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev">@lang('pagination.previous')</a>
                </li>
            @endif

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="page-item shadow-lg" style="">
                    <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next">@lang('pagination.next')</a>
                </li>
            @else
                <li class="page-item disabled shadow-lg" aria-disabled="true">
                    <span class="page-link">@lang('pagination.next')</span>
                </li>
            @endif
        </ul>
    </nav>
@endif


{{-- @if ($paginator->hasPages())
<div class="navigation-area">
    <div class="row">
        @if ($paginator->onFirstPage())
            <div class="col-lg-6 col-md-6 col-12 nav-left flex-row d-flex justify-content-start align-items-center ">
                <div class="thumb">
                    <a class="disabled">
                        <img class="img-fluid" src="{{ asset('images/2.png') }}" alt="" style="max-width: 100%;
                        height: auto;

                        ">
                    </a>
                </div>
                <div class="arrow"  class="disabled">
                    <a class="disabled">
                        <span class="ti-arrow-left text-white"></span>
                    </a>
                </div>
                <div class="detials">
                    <p>Prev Post</p>
                    <a class="disabled">
                        <h4>Space The Final Frontier</h4>
                    </a>
                </div>
            </div>

        @else

        <div class="col-lg-6 col-md-6 col-12 nav-left flex-row d-flex justify-content-start align-items-center">
            <div class="thumb">
                <a href="{{ $paginator->previousPageUrl() }}">
                    <img class="img-fluid" src="{{ asset('images/2.png') }}" alt="">
                </a>
            </div>
            <div class="arrow">
                <a href="{{ $paginator->previousPageUrl() }}">
                    <span class="ti-arrow-left text-white"></span>
                </a>
            </div>
            <div class="detials">
                <p>Prev Post</p>
                <a href="{{ $paginator->previousPageUrl() }}">
                    <h4>Space The Final Frontier</h4>
                </a>
            </div>
        </div>

        @endif

        @if ($paginator->hasMorePages())
            <div class="col-lg-6 col-md-6 col-12 nav-right flex-row d-flex justify-content-end align-items-center">
                <div class="detials">
                    <p>Next Post</p>
                    <a href="{{ $paginator->nextPageUrl() }}">
                        <h4>Telescopes 101</h4>
                    </a>
                </div>
                <div class="arrow">
                    <a href="{{ $paginator->nextPageUrl() }}">
                        <span class="ti-arrow-right text-white"></span>
                    </a>
                </div>
                <div class="thumb">
                    <a href="{{ $paginator->nextPageUrl() }}">
                        <img class="img-fluid" src="{{ asset('images/1.png') }}" alt="">
                    </a>
                </div>
            </div>
        @else
            <div class="col-lg-6 col-md-6 col-12 nav-right flex-row d-flex justify-content-end align-items-center">
                <div class="detials">
                    <p>Next Post</p>
                    <a class="disabled">
                        <h4>Telescopes 101</h4>
                    </a>
                </div>
                <div class="arrow">
                    <a class="disabled">
                        <span class="ti-arrow-right text-white"></span>
                    </a>
                </div>
                <div class="thumb">
                    <a class="disabled">
                        <img class="img-fluid" src="img/blog/next.jpg" alt="">
                    </a>
                </div>
            </div>
        @endif

    </div>
  </div>
@endif --}}