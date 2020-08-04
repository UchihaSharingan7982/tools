@extends('layouts.app')

@section('title', Lang::get('metachecker.meta-title'))

@section('meta-desc', Lang::get('metachecker.meta-desc'))

@section('meta-keyword', Lang::get('metachecker.meta-keyword'))

@section('conical','/en/page-title-meta-description-checker')

@section('en-link','/en/page-title-meta-description-checker')

@section('id-link','/id/page-title-meta-description-checker')

@section('content')
@push('style')
<style media="screen">
  @media only screen and (max-width: 768px) {
    #desktop {
      display: none;
    }

    #mobile {
      width: 100%;
    }
  }
</style>
@endpush
<div class="card card-custom mb-5" id="kt_page_stretched_card">
  <div class="card-header">
    <div class="card-title">
      <h3 class="card-label">@lang('metachecker.title')</h3>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-lg-8 mb-5" id="desktop">
    <!--begin::Card-->
    <div class="card card-custom card-stretch">
      <div class="card-header justify-content-center">
        <div class="card-title">
          <i class="fas fa-laptop icon-3x"></i>
        </div>
      </div>
      <div class="card-body">
        <div class="col-md-12 p-5" style="background-color:white; border:1px solid #EEF0F8; height:100%;">
          <span id="resulttitle">CMLABS / Content Marketing Labs Indonesia</span><br>
          <span id="resulturl">https://cmlabs.co</span> <br>
          <span id="resultdesc">@lang('metachecker.desc-result')</span>
        </div>
      </div>
    </div>
    <!--end::Card-->
  </div>
  <div class="col-lg-4 mb-5" id="mobile">
    <!--begin::Card-->
    <div class="card card-custom card-stretch">
      <div class="card-header justify-content-center">
        <div class="card-title">
          <i class="fas fa-mobile-alt icon-3x"></i>
        </div>
      </div>
      <div class="card-body">
        <div class="col-md-12 p-5" style="background-color:white; border:1px solid #EEF0F8; height:100%;">
          <span id="resulturlmobile">https://cmlabs.co</span><br>
          <span id="resulttitlemobile">CMLABS / Content Marketing Labs Indonesia</span> <br>
          <span id="resultdescmobile">@lang('metachecker.desc-result')</span>
        </div>
      </div>
    </div>
    <!--end::Card-->
  </div>

</div>
<div class="row " data-sticky-container>
  <div class="col-lg-8 mb-5">
    <div class="card card-custom mb-5">
      <div class="card-header">
        <div class="card-title">
          <h3 class="card-label">URL's <small></small></h3>
        </div>
      </div>
      <div class="card-body">
        <input type="text" name="" class="form-control" value="https://cmlabs.co" id="url">
        <button type="button" class="btn btn-primary mt-5" name="button" id="execute">@lang('metachecker.btn-get')
        </button>
        <br> <br>
        <a onclick="copy('url')" style="cursor:pointer;"> <small>@lang('metachecker.copy')</small> </a> <br>
        <small id="urlcheck">eg. https://cmlabs.co/en/</small>
      </div>
    </div>


    <div class="card card-custom mb-5 mt-5">
      <div class="card-header">
        <div class="card-title">
          <h3 class="card-label">@lang('metachecker.page-title') <small></small></h3>
        </div>
      </div>
      <div class="card-body">
        <input id="title" type="text" name="" class="form-control" value="CMLABS / Content Marketing Labs Indonesia"> <br>
        <a onclick="copy('title')" style="cursor: pointer"> <small>@lang('metachecker.copy')</small> </a> <br>
        <small id="titlecount"></small>
      </div>


    </div>
    <div class="card card-custom mb-5 mt-5">
      <div class="card-header">
        <div class="card-title">
          <h3 class="card-label">META DESCRIPTION <small></small></h3>
        </div>
      </div>
      <div class="card-body">
        <input id="desc" type="text" name="" class="form-control" value="@lang('metachecker.desc-result')"><br>
        <a onclick="copy('desc')" style="cursor: pointer"> <small>@lang('metachecker.copy')</small> </a> <br>
        <small id="desccount"></small>
      </div>
    </div>

    <div class="card card-custom">
      <div class="card-header">
        <div class="card-title">
          <h3 class="card-label">@lang('metachecker.copy-0')</h3>
        </div>
      </div>
      <div class="card-body">
        <p><a href="https://cmlabs.co/kamus-seo/apa-itu-serp/" style="color:blue" class="font-weight-bold">@lang('metachecker.copy-1')</p>
        <table class="table" border="1px" bordercolor="#EBEDF3">
          <tbody>
            <tr>
              <th class="align-middle" style="text-align:center"> <i class="far fa-lightbulb icon-2x"></i> </th>
              <td class="align-middle">
                <p class="font-weight-bold">@lang('metachecker.copy-2')</p>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="card-header">
        <div class="card-title">
          <h3 class="card-label">URL</h3>
        </div>
      </div>
      <div class="card-body">
        <p>@lang('metachecker.copy-3')</p>
      </div>
      <div class="card-header">
        <div class="card-title">
          <h3 class="card-label">@lang('metachecker.copy-4')</h3>
        </div>
      </div>
      <div class="card-body">
        <p>@lang('metachecker.copy-5')</p>
      </div>
      <div class="card-header">
        <div class="card-title">
          <h3 class="card-label">@lang('metachecker.copy-6')</h3>
        </div>
      </div>
      <div class="card-body">
        <p>@lang('metachecker.copy-7')</p>
      </div>
      <div class="card-header">
        <div class="card-title">
          <h3 class="card-label">@lang('metachecker.copy-8')</h3>
        </div>
      </div>
      <div class="card-body">
        <center>
          <div class="col-12 col-md-7">
            <img src="https://cmlabs.co/wp-content/uploads/2020/06/serp-google-cmlabs-1024x820.png" width="100%" alt="">
          </div>
        </center>

        <p>@lang('metachecker.copy-9')</p>

        <h5>@lang('metachecker.copy-10')</h5>
        <table class="table">
          <tbody>
            <tr>
              <th scope="row" width="10%">@lang('metachecker.copy-11')</th>
              <td>@lang('metachecker.copy-12')</td>
            </tr>
            <tr>
              <th scope="row">@lang('metachecker.copy-13')</th>
              <td>@lang('metachecker.copy-14')</td>
            </tr>
          </tbody>
        </table>

        <h5>@lang('metachecker.copy-15')</h5>
        <table class="table">
          <tbody>
            <tr>
              <th scope="row" width="10%">@lang('metachecker.copy-16')</th>
              <td>@lang('metachecker.copy-17')</td>
            </tr>
            <tr>
              <th scope="row">@lang('metachecker.copy-18')</th>
              <td>@lang('metachecker.copy-19')</td>
            </tr>
            <tr>
              <th scope="row">@lang('metachecker.copy-20')</th>
              <td>@lang('metachecker.copy-21')</td>
            </tr>
            <tr>
              <th scope="row">@lang('metachecker.copy-22')</th>
              <td>@lang('metachecker.copy-23')</td>
            </tr>
            <tr>
              <th scope="row">@lang('metachecker.copy-24')</th>
              <td>@lang('metachecker.copy-25')</td>
            </tr>
          </tbody>
        </table>

        <h5>@lang('metachecker.copy-26')</h5>
        <table class="table">
          <tbody>
            <tr>
              <th scope="row" width="10%">@lang('metachecker.copy-27')</th>
              <td>@lang('metachecker.copy-28')</td>
            </tr>
            <tr>
              <th scope="row">@lang('metachecker.copy-29')</th>
              <td>@lang('metachecker.copy-30')</td>
            </tr>
            <tr>
              <th scope="row">@lang('metachecker.copy-31')</th>
              <td>@lang('metachecker.copy-32')</td>
            </tr>
            <tr>
              <th scope="row">@lang('metachecker.copy-33')</th>
              <td>@lang('metachecker.copy-34')</td>
            </tr>
            <tr>
              <th scope="row">*@lang('metachecker.copy-35')</th>
              <td>@lang('metachecker.copy-36')</td>
            </tr>
          </tbody>
        </table>
        <center>
          <div class="col-12 col-md-7">
            <img src="https://cmlabs.co/wp-content/uploads/2020/06/galaxy-note-10-cmlabs.png" width="100%" alt="">
          </div>
        </center>
      </div>

    </div>
  </div>

  <div class="col-lg-4">
    <div class="card card-custom sticky " data-sticky="true" data-margin-top="100" data-sticky-for="991">
      <!--begin::List Widget 4-->
      <div class="card card-custom card-stretch">
        <!--begin::Header-->
        <div class="card-header border-0">
          <h3 class="card-title font-weight-bolder text-dark">cmlabs Blog</h3>

        </div>
        <!--end::Header-->
        <!--begin::Body-->
        <div class="card-body pt-2">
          @for ($i = 0; $i < count($dataEN); $i++)
          @if($i == 0)
          <?php $color = "bg-success" ?>
          @elseif($i % 4 == 0)
          <?php $color = "bg-primary" ?>
          @elseif($i % 3 == 0)
          <?php $color = "bg-danger" ?>
          @elseif($i % 2 == 0)
          <?php $color = "bg-warning" ?>
          @elseif($i % 1 == 0)
          <?php $color = "bg-info" ?>
          @endif
          <!--begin::Item-->
          @if ($i == 0)
          <div class="d-flex align-items-center">
          @else
          <div class="d-flex align-items-center mt-10">
          @endif
              <span class="bullet bullet-bar {{$color}} align-self-stretch"></span>
              <div class="d-flex flex-column flex-grow-1 mx-4">
                @if($local == "en")
                <a href="{{$dataEN[$i]['link']}}" data-toggle="tooltip" title="{{$dataEN[$i]['title']}}" class="text-dark-75 text-hover-primary font-weight-bold font-size-lg mb-1">{{substr($dataEN[$i]['title'],0,strpos($dataEN[$i]['title'], ' ', 20))}} ...</a>
                <span class="text-muted font-weight-bold">{{$dataEN[$i]['date']}}</span>
                @else
                <a href="{{$dataID[$i]['link']}}" data-toggle="tooltip" title="{{$dataID[$i]['title']}}" class="text-dark-75 text-hover-primary font-weight-bold font-size-lg mb-1">{{substr($dataID[$i]['title'],0,strpos($dataID[$i]['title'], ' ', 20))}} ...</a>
                <span class="text-muted font-weight-bold">{{$dataID[$i]['date']}}</span>
                @endif
            </div>
          </div>
          <!--end:Item-->
          @endfor
        </div>
        <!--end::Body-->
      </div>
      <!--end:List Widget 4-->
    </div>
  </div>
</div>


<br>
<span id="titlesizer" class="pd-0"></span>
<span id="titlesizertemp"></span>
<span id="descsizer"></span>
<span id="descsizertemp"></span>


@endsection

@push('script')
<script src="{{asset('js/logic/metachecker.js')}}"></script>
@endpush
@section('title-checker')
active
@endsection
