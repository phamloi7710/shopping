@extends('woo-commerce::admin.general.master')
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">@lang('woo-commerce::title.management', ['attribute' => __('woo-commerce::title.language')])</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('woo.admin.index')}}">@lang('woo-commerce::title.dashboard')</a></li>
                            <li class="breadcrumb-item"><a href="#">@lang('woo-commerce::title.management', ['attribute' => ''])</a></li>
                            <li class="breadcrumb-item active">@lang('woo-commerce::title.management', ['attribute' => __('woo-commerce::title.language')])</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-5">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">@lang('woo-commerce::title.add_new', ['attribute' => __('woo-commerce::title.language')])</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form role="form">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">@lang('woo-commerce::title.select', ['attribute' => __('woo-commerce::title.language')])</label>
                                        <select name="sltLanguage" class="form-control select2bs4" style="width: 100%;">
                                            <option value="af"> Afrikaans - af</option>
                                            <option value="ar"> العربية - ar</option>
                                            <option value="ary"> العربية المغربية - ary</option>
                                            <option value="az"> Azərbaycan - az</option>
                                            <option value="azb"> گؤنئی آذربایجان - azb</option>
                                            <option value="bel"> Беларуская мова - bel</option>
                                            <option value="bg_BG"> български - bg_BG</option>
                                            <option value="bn_BD"> বাংলা - bn_BD</option>
                                            <option value="bo"> བོད་སྐད - bo</option>
                                            <option value="bs_BA"> Bosanski - bs_BA</option>
                                            <option value="ca"> Català - ca</option>
                                            <option value="ceb"> Cebuano - ceb</option>
                                            <option value="cs_CZ"> Čeština - cs_CZ</option>
                                            <option value="cy"> Cymraeg - cy</option>
                                            <option value="da_DK"> Dansk - da_DK</option>
                                            <option value="de_CH"> Deutsch - de_CH</option>
                                            <option value="de_CH_informal"> Deutsch - de_CH_informal</option>
                                            <option value="de_DE"> Deutsch - de_DE</option>
                                            <option value="de_DE_formal"> Deutsch - de_DE_formal</option>
                                            <option value="el"> Ελληνικά - el</option>
                                            <option value="en_AU"> English - en_AU</option>
                                            <option value="en_CA"> English - en_CA</option>
                                            <option value="en_GB"> English - en_GB</option>
                                            <option value="en_NZ"> English - en_NZ</option>
                                            <option value="en_ZA"> English - en_ZA</option>
                                            <option value="en_US"> English - en_US</option>
                                            <option value="eo"> Esperanto - eo</option>
                                            <option value="es_AR"> Español - es_AR</option>
                                            <option value="es_CL"> Español - es_CL</option>
                                            <option value="es_CO"> Español - es_CO</option>
                                            <option value="es_ES"> Español - es_ES</option>
                                            <option value="es_GT"> Español - es_GT</option>
                                            <option value="es_MX"> Español - es_MX</option>
                                            <option value="es_PE"> Español - es_PE</option>
                                            <option value="es_VE"> Español - es_VE</option>
                                            <option value="et"> Eesti - et</option>
                                            <option value="eu"> Euskara - eu</option>
                                            <option value="fa_AF"> فارسی - fa_AF</option>
                                            <option value="fa_IR"> فارسی - fa_IR</option>
                                            <option value="fi"> Suomi - fi</option>
                                            <option value="fo"> Føroyskt - fo</option>
                                            <option value="fr_BE"> Français - fr_BE</option>
                                            <option value="fr_CA"> Français - fr_CA</option>
                                            <option value="fr_FR"> Français - fr_FR</option>
                                            <option value="fy"> Frysk - fy</option>
                                            <option value="gd"> Gàidhlig - gd</option>
                                            <option value="gl_ES"> Galego - gl_ES</option>
                                            <option value="gu"> ગુજરાતી - gu</option>
                                            <option value="haz"> هزاره گی - haz</option>
                                            <option value="he_IL"> עברית - he_IL</option>
                                            <option value="hi_IN"> हिन्दी - hi_IN</option>
                                            <option value="hr"> Hrvatski - hr</option>
                                            <option value="hu_HU"> Magyar - hu_HU</option>
                                            <option value="hy"> Հայերեն - hy</option>
                                            <option value="id_ID"> Bahasa Indonesia - id_ID</option>
                                            <option value="is_IS"> Íslenska - is_IS</option>
                                            <option value="it_IT"> Italiano - it_IT</option>
                                            <option value="ja"> 日本語 - ja</option>
                                            <option value="jv_ID"> Basa Jawa - jv_ID</option>
                                            <option value="ka_GE"> ქართული - ka_GE</option>
                                            <option value="kk"> Қазақ тілі - kk</option>
                                            <option value="ko_KR"> 한국어 - ko_KR</option>
                                            <option value="ckb"> کوردی - ckb</option>
                                            <option value="lo"> ພາສາລາວ - lo</option>
                                            <option value="lt_LT"> Lietuviškai - lt_LT</option>
                                            <option value="lv"> Latviešu valoda - lv</option>
                                            <option value="mk_MK"> македонски јазик - mk_MK</option>
                                            <option value="mn"> Монгол хэл - mn</option>
                                            <option value="mr"> मराठी - mr</option>
                                            <option value="ms_MY"> Bahasa Melayu - ms_MY</option>
                                            <option value="my_MM"> ဗမာစာ - my_MM</option>
                                            <option value="mv"> Maldives - mv</option>
                                            <option value="nb_NO"> Norsk Bokmål - nb_NO</option>
                                            <option value="ne_NP"> नेपाली - ne_NP</option>
                                            <option value="nl_NL"> Nederlands - nl_NL</option>
                                            <option value="nl_NL_formal"> Nederlands - nl_NL_formal</option>
                                            <option value="nn_NO"> Norsk Nynorsk - nn_NO</option>
                                            <option value="oci"> Occitan - oci</option>
                                            <option value="pl_PL"> Polski - pl_PL</option>
                                            <option value="ps"> پښتو - ps</option>
                                            <option value="pt_BR"> Português - pt_BR</option>
                                            <option value="pt_PT"> Português - pt_PT</option>
                                            <option value="ro_RO"> Română - ro_RO</option>
                                            <option value="ru_RU"> Русский - ru_RU</option>
                                            <option value="si_LK"> සිංහල - si_LK</option>
                                            <option value="sk_SK"> Slovenčina - sk_SK</option>
                                            <option value="sl_SI"> Slovenščina - sl_SI</option>
                                            <option value="so_SO"> Af-Soomaali - so_SO</option>
                                            <option value="sq"> Shqip - sq</option>
                                            <option value="sr_RS"> Српски језик - sr_RS</option>
                                            <option value="su_ID"> Basa Sunda - su_ID</option>
                                            <option value="sv_SE"> Svenska - sv_SE</option>
                                            <option value="szl"> Ślōnskŏ gŏdka - szl</option>
                                            <option value="ta_LK"> தமிழ் - ta_LK</option>
                                            <option value="th"> ไทย - th</option>
                                            <option value="tl"> Tagalog - tl</option>
                                            <option value="tr_TR"> Türkçe - tr_TR</option>
                                            <option value="ug_CN"> Uyƣurqə - ug_CN</option>
                                            <option value="uk"> Українська - uk</option>
                                            <option value="ur"> اردو - ur</option>
                                            <option value="uz_UZ"> Oʻzbek - uz_UZ</option>
                                            <option value="vec"> Vèneto - vec</option>
                                            <option value="vi"> Tiếng Việt - vi</option>
                                            <option value="zh_CN"> 中文 (中国) - zh_CN</option>
                                            <option value="zh_HK"> 中文 (香港) - zh_HK</option>
                                            <option value="zh_TW"> 中文 (台灣) - zh_TW</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Password</label>
                                        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputFile">File input</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="exampleInputFile">
                                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                            </div>
                                            <div class="input-group-append">
                                                <span class="input-group-text" id="">Upload</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                        <label class="form-check-label" for="exampleCheck1">Check me out</label>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="card card card-primary">
                            <div class="card-header">
                                <h5 class="card-title">@lang('woo-commerce::title.list', ['attribute' => __('woo-commerce::title.language')])</h5>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-tool dropdown-toggle" data-toggle="dropdown">
                                            <i class="fas fa-wrench"></i>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-right" role="menu">
                                            <a href="#" class="dropdown-item">Action</a>
                                            <a href="#" class="dropdown-item">Another action</a>
                                            <a href="#" class="dropdown-item">Something else here</a>
                                            <a class="dropdown-divider"></a>
                                            <a href="#" class="dropdown-item">Separated link</a>
                                        </div>
                                    </div>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover table-bordered table-sm">
                                    <thead>
                                        <tr>
                                            <th class="text-center">@lang('woo-commerce::title.name', ['attribute' => __('woo-commerce::title.language')])</th>
                                            <th class="text-center">@lang('woo-commerce::title.flag')</th>
                                            <th>@lang('woo-commerce::title.status')</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="text-center">Tiếng Việt</td>
                                            <td>John Doe</td>
                                            <td class="text-center">Đang Hoạt Động</td>
                                            <td><span class="tag tag-success">Approved</span></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
            </div>
        </section>
    </div>
@stop
@section('script')
    <script>
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        })
    </script>
@stop
