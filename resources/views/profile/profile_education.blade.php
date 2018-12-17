@extends('layouts/main-app')

@section('content')


    <!-- Page Content -->
    <div class="content">


        <div class="block-header block-header-default">
            <h3 class="block-title"><i class="nav-main-link-icon fa fa-briefcase"></i> &nbsp;Education</h3>
            <div class="block-options">
                <div id="add-education-btn" class=" ">
                    <div class="col-md-2 float-right">
                        <button type="button" id="add-education" class="btn btn-primary add-education float-right">
                            <i class="fa fa-fw fa-plus mr-1"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div id="education_prev" class="">
            @foreach ($educations as $education)
                <div id="" class="block block-rounded block-bordered">
                    <div  class=" block-content block-content-full">
                        <div class="row">
                            <div class="col-lg-9" id="lbl_preview_output_date_join_mobile_0">
                                <h4 class="custom-control-data-label">
                                    {{$education->qname}}
                                </h4>
                            </div>


                            <div class="col-md-2 float-right">
                                <table>
                                    <tr>
                                        <td>
                                            <a href="#" class="edit-education pull" data-toggle="modal" data-target="#modal-block-large"
                                               data-id="{{$user->id}}" data-idform="{{$education->id}}" data-name="{{$user->name}}" data-university-name="{{$education->university_name}}" data-graduation-date="{{$education->graduation_date}}"    data-country="{{$education->countries_id}}" data-field="{{$education->field}}"  data-course="{{$education->courses_id}}"  data-qualification="{{$education->qualifications_id}}" data-major="{{$education->major}}" data-grade="{{$education->grade}}"  data-other-uni="{{$education->other_uni}}"  data-details="{{$education->desc}}" data-cgpa="{{$education->cgpa}}" data-desc="{{$education->desc}}" data-empty="" >

                                                <button class="btn btn-sm btn-primary pull"><i class="nav-main-link-icon fa fa-edit"></i> Edit</button>
                                            </a>
                                        </td>
                                        <td>
                                            <form action="{{'/profile/profile_education/delete'}}" method="Post" >
                                                <input type="hidden"  id="val-experience-delete"  name="valeducationdelete" value="{{$education->id}}">
                                                <button class="btn btn-sm btn-primary pull submit-education-delete">
                                                    <i class="nav-main-link-icon fa fa-trash-alt "></i> Delete
                                                </button>

                                            </form>
                                        </td>
                                    </tr>
                                </table>
                            </div>




                        </div>

                        <div class="row">


                            <div class="col-md-4">
                                <label class="custom-control-data-label" id="lbl_experience_industry">University/Institute</label>
                            </div>
                            <div class="col-md-4">
                                <label id="lbl_experience_industry_output">@if( isset($education->other_uni)   )
                                        {{$education->other_uni}} @else
                                      {{$education->fname}} @endif
                                </label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <label class="custom-control-data-label" id="lbl_experience_industry">course</label>
                            </div>
                            <div class="col-md-4">
                                <label id="lbl_experience_industry_output">{{$education->academic_field}} </label>
                            </div>
                        </div>
                        <div class="row">

                            <div class="col-md-4">
                                <label class="custom-control-data-label" id="lbl_experience_industry">major</label>
                            </div>
                            <div class="col-md-4">
                                <label id="lbl_experience_industry_output">{{$education->major}}</label>
                            </div>
                        </div>

                        <div class="row">

                            <div class="col-md-4">
                                <label class="custom-control-data-label" id="lbl_experience_industry">Institute/University location</label>
                            </div>
                            <div class="col-md-4">
                                <label id="lbl_experience_industry_output">{{$education->cname}}</label>
                            </div>
                        </div>

                        <div class="row">

                            <div class="col-md-4">
                                <label class="custom-control-data-label" id="lbl_experience_industry">Grade</label>
                            </div>
                            <div class="col-md-4">
                                <label id="lbl_experience_industry_output"> {{$education->grade}}  </label>
                            </div>
                        </div>

                </div>
                </div>
            @endforeach

        </div>


        <!-- jQuery Validation (.js-validation class is initialized in js/pages/be_forms_validation.min.js which was auto compiled from _es6/pages/be_forms_validation.js) -->
        <!-- For more examples you can check out https://github.com/jzaefferer/jquery-validation -->
        <!-- <div class="block-header block-header-default">
            </div> -->
        <form id ="add-education"  action="/profile/profile_education/store"  method="post"    class="js-validation">
            <div class="block block-rounded">
                <div id="educations" class="block-content block-content-full education-section "@if (count($educations) > 0)style="display:none" @endif>
                    <div class="">
                        <!-- Regular -->
                        <h2 class="content-heading">Education</h2>
                        <div class="row items-push">
                            <div class="col-lg-4">
                                <p class="text-muted">
                                    Username, email and password validation made easy for your login/register forms
                                </p>
                            </div>
                            <div class="col-lg-8 col-xl-5">

                                <br />

                                <div class="form-group">
                                    <label for="val-username">Institute/University<span class="text-danger">*</span></label>
                                    <select class="form-control" id="add-institute" name="add-institute" aria-describedby="val-specialization-error" aria-invalid="true" style="width: 60%;
">

                                    </select>
                                </div>

                                <input type="text" class="form-control hide" id="add-others-uni" name="add-others-uni" placeholder="Please state your institute/university name">



                                <div class="form-group">
                                    <label for="val-username">Qualification<span class="text-danger">*</span></label>
                                    <select class="form-control" id="add-qualification" name="add-qualification" aria-describedby="val-specialization-error" aria-invalid="true" style="width: 60%;
">
                                        <option value="0" title="- Select Qualification -&quot;, &quot;0&quot;, ">- Select Qualification -</option>
                                        <option value="1" title="Primary/Secondary School/SPM/'O' Level">Primary/Secondary School/SPM/'O' Level</option>
                                        <option value="2" title="Higher Secondary/STPM/'A' Level/Pre-U">Higher Secondary/STPM/'A' Level/Pre-U</option>
                                        <option value="3" title="Professional Certificate">Professional Certificate</option>
                                        <option value="4" title="Diploma">Diploma</option>
                                        <option value="5" title="Advanced/Higher/Graduate Diploma">Advanced/Higher/Graduate Diploma</option>
                                        <option value="6" title="Bachelor's Degree">Bachelor's Degree</option>
                                        <option value="7" title="Post Graduate Diploma">Post Graduate Diploma</option>
                                        <option value="8" title="Professional Degree">Professional Degree</option>
                                        <option value="9" title="Master's Degree">Master's Degree</option>
                                        <option value="10" title="Doctorate (PhD)">Doctorate (PhD)</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="val-email">Graduation Date<span class="text-danger">*</span></label>
                                    <input type="text" class="js-datepicker form-control-date" id="add-graduation-date" name="add-graduation-date" data-week-start="1" data-autoclose="true" data-today-highlight="true" data-date-format="dd/mm/yyyy" placeholder="dd/mm/yyyy">
                              </div>




                                <div class="form-group">
                                    <label for="val-email">Institute/University Location<span class="text-danger">*</span></label>
                                </div>
                                <div class="form-group">

                          <select class="form-control" id="add-country-institute" name="add-country-institute" aria-describedby="val-specialization-error" aria-invalid="true" style="width: 60%;
">
                                        <option disabled="" selected="" value="0">select countries </option>
                                    </select>
                                </div>
                                {{--<div class="form-group">--}}

                                    {{--<select class="form-control" id="add-states-institute" name="add-states-institute" aria-describedby="val-specialization-error" aria-invalid="true" style="width: 60%;>--}}
                                        {{--<option disabled="" selected="" value="0">-select states-</option>--}}
                                    {{--</select>--}}
                                {{--</div>--}}

                                {{--<div class="form-group">--}}
                                    {{--<label for="val-email">CGPA<span class="text-danger"></span></label>--}}
                                    {{--<input type="text" class="CGPA" id="add-major" name="add-major" placeholder="">--}}
                                {{--</div>--}}



                                <div class="form-group">
                                    <label for="val-email">Academic Field<span class="text-danger">*</span></label>
                                    <select class="form-control" id="add-field" name="add-field" aria-describedby="val-specialization-error" aria-invalid="true">
                                        <option disabled="" selected="" value="0">-select course-</option>
                                        <option value="1">Applied sciences</option>
                                        <option value="2">Humanities</option>
                                        <option value="3">Natural sciences/ Pure sciences</option>
                                        <option value="4">Social sciences</option>
                                        <option value="Others">Others</option>
                                    </select>
                                </div>

                                <div id="keyword-job-specification" class="form-group ">
                                    <label for="val-email">Course<span class="text-danger">*</span></label>
                                    <select class="form-control" id="add-course" name="add-course" aria-describedby="val-specialization-error" aria-invalid="true">
                                        <option disabled="" selected="" value="0">select course field</option>

                                    </select>
                                </div>



                                <div class="form-group">
                                    <label for="val-email">Major<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="add-major" name="add-major" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label for="val-email">Grade<span class="text-danger"></span></label>
                                    <select class="form-control" id="add-grade" name="add-grade" aria-describedby="val-specialization-error" aria-invalid="true">
                                        <option disabled="" selected="" value="0">select Grades </option>
                                        <option value="A">Grade A</option>
                                        <option value="B">Grade B</option>
                                        <option value="C">Grade C</option>
                                        <option value="D">Grade D</option>
                                        <option value="1st">1st Class </option>
                                        <option value="2ndUP">2nd Class Upper </option>
                                        <option value="2ndLOW">2nd Class Lower </option>
                                        <option value="3rd">3rd Class </option>
                                        <option value="CGPA">CGPA/Percentage</option>
                                        <option value="1sd">Pass/Non-gradable</option>
                                        <option value="Fail">Fail</option>
                                        <option value="Inc">Incomplete</option>
                                        <option value="Ongoing">On-going</option>
                                    </select>
                                </div>
                                <div id="cgpa" class="form-group hide">
                                    <label for="val-email">CGPA<span class="text-danger"></span></label>
                                    <input type="text" class="form-control-cgpa" id="add-cgpa" name="add-major" placeholder="">
                                </div>


                                <div class="form-group">
                                    <label for="val-email">Additional Information<span class="text-danger">*</span></label>
                                    <textarea class="form-control" id="add-information" name="add-information" rows="4" placeholder="Describe your experience "></textarea>
                                </div>

                            </div>
                        </div>
                        <!-- END Regular -->

                        <!-- Submit -->
                        <div class="row items-push">
                            <div class="col-sm-2 offset-sm-1 submit-education" style="
    padding-left: 37rem";>
                                <button type="submit" class="btn btn-primary submit-education">Submit</button>
                            </div>

                            <div class="col-sm-1 offset-sm-1 cancel-submit-education btn btn-primary ">
                                Cancel
                            </div>
                        </div>
                        <!-- END Submit -->
                    </div>

                </div>
            </div>
        </form>


        <!-- END Page Content -->
        <!-- Modal Content -->
        <div class="modal fade" id="modal-block-large" tabindex="-1" role="dialog" aria-labelledby="modal-block-large" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="block block-themed block-transparent mb-0">
                        <div class="block-header bg-primary">
                            <h3 class="block-title"><i class="nav-main-link-icon fa fa-address-card"></i> &nbsp;Education</h3>

                        </div>
                        <div class="block block-rounded block-bordered">

                            <form id="foredit"  method="post" action="/profile/profile_experience/update">

                                <div id="experiences" class="block-content block-content-full experience-section">

                                    <div class="block-content block-content-full">
                                        <div class="">
                                            <!-- Regular -->
                                            <h2 class="content-heading">Education</h2>
                                            <div class="row items-push">
                                                <div class="col-lg-2" ></div>
                                                <div class="col-lg-8 col-xl-8">
                                                    <br />
                                                    <input type="hidden" class="form-control" id="id-edit" name="id-edit" >
                                                    <div class="form-group">
                                                        <label for="val-username">Institute/University <span class="text-danger">*</span></label>
                                                        <select class="form-control" id="institute-name-edit" name="institute-name-edit" aria-describedby="val-specialization-error" aria-invalid="true" style="width: 60%;">
                                                            <option disabled="" selected="" value="0">select Institute/University</option>
                                                            <option value="1">Asia Pacific University of Technology &amp; Innovation (APU)</option>
                                                            <option value="2">Admal Aviation College</option>
                                                            <option value="3">ALAM - Akademi Laut Malaysia</option>
                                                            <option value="4">Al-Madinah International University</option>
                                                            <option value="5">AeU - Asia e University</option>
                                                            <option value="6">AMU - Asia Metropolitan University</option>
                                                            <option value="7">Asia Pacific Institute of Information Technology (APIIT)</option>
                                                            <option value="8">Arte Academy</option><option value="9">Aviation Management College</option>
                                                            <option value="10">Asean Culinary Academy</option><option value="11">ATI College</option>
                                                            <option value="12">ALFA International College</option>
                                                            <option value="13">Advance Tertiary College (ATC) Penang</option>
                                                            <option value="14">Advance Tertiary College (ATC) Kuala Lumpur</option>
                                                            <option value="15">Allied Aeronautics Training Centre</option>
                                                            <option value="16">Brickfields Asia College (BAC) Kuala Lumpur</option>
                                                            <option value="17">Brickfields Asia College (BAC) Petaling Jaya</option>
                                                            <option value="18">BERJAYA University College of Hospitality</option>
                                                            <option value="19">Binary University of Management and Entrepreneurship</option>
                                                            <option value="20">BCM - Bible College of Malaysia</option>
                                                            <option value="21">British Council Malaysia</option><option value="22">British Council - The Curve</option><option value="23">British Council - Penang</option><option value="24">Curtin University, Malaysia</option><option value="25">CUCMS - Cyberjaya University College of Medical Sciences</option><option value="26">CUCST - City University College of Science and Technology</option><option value="27">Cilantro Culinary Academy</option><option value="28">Claz'room Academy</option><option value="29">Crescendo International College</option><option value="30">DRB-Hicom University of Automotive Malaysia</option><option value="31">Dasien Academy of Art</option><option value="32">Disted College</option><option value="33">Edinburgh Napier University</option><option value="34">East West International College</option><option value="35">Erican College</option><option value="36">Ecole De Patisserie</option><option value="37">Equator College</option><option value="38">First City University College</option><option value="39">Flamingo International College</option><option value="40">FTMS College</option><option value="41">Famous Chef Professional Baking &amp; Culinary Academy</option><option value="42">Geomatika College International</option><option value="43">GMI - German-Malaysian Institute</option><option value="44">HMA - HM Aerospace</option><option value="45">Han Chiang University College of Communication</option><option value="46">HELP University</option><option value="47">HELP CAT - HELP College of Arts and Technology</option><option value="48">Heriot-Watt University Malaysia</option><option value="49">Infrastructure University Kuala Lumpur (IUKL)</option><option value="50">International University of Malaya-Wales (IUMW)</option><option value="51">INTEC Education College</option><option value="52">INCEIF - International Centre for Education in Islamic Finance</option><option value="53">IUCTT - International University College of Technology Twintech</option><option value="54">IACT College</option><option value="55">IMPERIA Institute of Technology</option><option value="56">ICOM - International College Of Music</option><option value="57">IMU - International Medical University</option><option value="58">I-UCAS - International University College of Arts and Science</option><option value="59">INSANIAH University College</option><option value="60">IIUM - International Islamic University Malaysia</option><option value="61">INTI International University</option><option value="62">ICYM - International College of Yayasan Melaka</option><option value="63">IMC - International Medical College</option><option value="64">IBS College</option><option value="65">Kolej Yayasan UEM (KYUEM)</option><option value="66">KLMUC - Kuala Lumpur Metropolitan University College</option><option value="67">KUIS - Selangor International Islamic University College</option><option value="68">KLT - Kolej Laila Taib</option><option value="69">KTS - Kolej TAFE Seremban</option><option value="70">KUIM - Islamic University College of Melaka</option><option value="71">KDU University College</option><option value="72">KPJ Healthcare University College</option><option value="73">KFCH International College</option><option value="74">KTT - Kolej Teknologi Timur</option><option value="75">KTAC - Cybernetics International College of Technology</option><option value="76">Kolej Yayasan Sabah</option><option value="77">Kolej Teknologi Darulnaim</option><option value="78">KLIA Professional &amp; Management College</option><option value="79">KYS Business School (KYSB)</option><option value="80">Kuala Lumpur Metropolitan University College (KLMUC)</option><option value="81">Kolej Universiti Poly-Tech MARA (KUPTM)</option><option value="82">KDU Penang University College</option><option value="83">LimKokWing University</option><option value="84">Linton University College</option><option value="85">Life College Malaysia</option><option value="86">Lincoln University College (LUC)</option><option value="87">Methodist College Kuala Lumpur (MCKL)</option><option value="88">MFA - Malaysian Flying Academy</option><option value="89">MMMC - Melaka Manipal Medical College</option><option value="90">Manipal International University (MIU) Nilai</option><option value="91">MUST - Malaysia University of Science and Technology</option><option value="92">MAHSA University</option><option value="93">Monash University Malaysia</option><option value="94">MMU - Multimedia University</option><option value="95">MSU - Management &amp; Science University</option><option value="96">Malaysian Institute of Art (MIA)</option><option value="97">Malvern International Academy</option><option value="98">Mantissa College</option><option value="99">MAHSA Prima International College</option><option value="100">Meritus University</option><option value="101">NuMED - Newcastle University Medicine Malaysia</option><option value="102">NMIT - Netherlands Maritime Institute of Technology</option><option value="103">Nilai University</option><option value="104">New Era University College</option><option value="105">North Borneo University College (NBUC)</option><option value="106">OUM - Open University Malaysia</option><option value="107">Olympia College</option><option value="108">Optopreneur College</option><option value="109">PIIC - Putra Intelek International College</option><option value="110">PIDC - Penang International Dental College</option><option value="111">PTPL - Pusat Teknologi &amp; Pengurusan Lanjutan College</option><option value="112">Portman College</option><option value="113">PMC - Penang Medical College</option><option value="114">PIC - Putra International College</option><option value="115">Putra Business School</option><option value="116">Point College</option><option value="117">President's College</option><option value="118">Pintar College</option><option value="119">Perdana University</option><option value="120">Peninsula College</option><option value="121">QIUP - Quest International University Perak</option><option value="122">Ramsay Sime Darby Healthcare College</option><option value="123">Raffles University Iskandar</option><option value="124">Raffles College of Higher Education</option><option value="125">RENG College of Technology and Design</option><option value="126">Reliance College</option><option value="127">Ranaco Education and Training Institute (RETI)</option><option value="128">SEGi University Kota Damansara</option><option value="129">Saito College</option><option value="130">Southern University College</option><option value="131">Sunway College</option><option value="132">Sunway University</option><option value="133">Swinburne University of Technology Sarawak Campus</option><option value="134">Stamford College</option><option value="135">Sentral College Penang</option><option value="136">SPACE College (Kolej SPACE)</option><option value="137">Silverspoon International College (SSiC)</option><option value="138">Sunway Le Cordon Bleu</option><option value="139">SEGi University &amp; Colleges Sarawak</option><option value="140">SEGi University &amp; Colleges Penang</option><option value="141">SEGi University &amp; Colleges Kuala Lumpur</option><option value="142">SEGi University &amp; Colleges Subang Jaya</option><option value="143">TOC - The Otomotif College</option><option value="144">The One Academy</option><option value="145">TATIUC - TATI University College</option><option value="146">Taylor's University</option><option value="147">TMC College</option><option value="148">TAJ International College</option><option value="149">TAR UC - Tunku Abdul Rahman University College Sabah Faculty Branch</option><option value="150">TAR UC - Tunku Abdul Rahman University College Perak Branch Campus</option><option value="151">TAR UC - Tunku Abdul Rahman University College Penang Branch Campus</option><option value="152">TAR UC - Tunku Abdul Rahman University College Pahang Faculty Branch</option><option value="153">TAR UC - Tunku Abdul Rahman University College Johor Branch Campus</option><option value="154">TAR UC - Tunku Abdul Rahman University College Kuala Lumpur Campus</option><option value="155">Taylor's College Sri Hartamas (TCSH)</option><option value="156">Taylor's College Subang Jaya (TCSJ)</option><option value="157">Tung Shin Academy of Nursing</option><option value="158">Universiti Teknologi PETRONAS (UTP)</option><option value="159">Universiti Tenaga Nasional (UNITEN)</option><option value="160">University College of Technology Sarawak (UCTS)</option><option value="161">UNITAR International University</option><option value="162">Universiti Kebangsaan Malaysia (UKM)</option><option value="163">UniKL - Universiti Kuala Lumpur</option><option value="164">Universiti Malaysia Kelantan</option><option value="165">UNIMAP - Universiti Malaysia Perlis</option><option value="166">UMS - Universiti Malaysia Sabah</option><option value="167">UNIMAS - Universiti Malaysia Sarawak</option><option value="168">UPM - Universiti Putra Malaysia</option><option value="169">University of Nottingham Malaysia Campus</option><option value="170">University of Southampton Malaysia Campus</option><option value="171">UCSI University Malaysia</option><option value="172">UPNM - Universiti Pertahanan Nasional Malaysia</option><option value="173">UPSI - Universiti Pendidikan Sultan Idris</option><option value="174">UM - University of Malaya</option><option value="175">UMT - Universiti Malaysia Terengganu</option><option value="176">USIM - Universiti Sains Islam Malaysia</option><option value="177">USM - Universiti Sains Malaysia</option><option value="178">UNISEL - Universiti Selangor</option><option value="179">UniRazak - Universiti Tun Abdul Razak</option><option value="180">Universiti Sultan Zainal Abidin</option><option value="181">UTeM - Universiti Teknikal Malaysia Melaka</option><option value="182">UTM - Universiti Teknologi Malaysia</option><option value="183">UMP - Universiti Malaysia Pahang</option><option value="184">UUM - Universiti Utara Malaysia</option><option value="185">Universiti Tun Hussein Onn Malaysia</option><option value="186">UiTM - Universiti Teknologi Mara</option><option value="187">University of Reading Malaysia</option><option value="188">UniMy - University Malaysia of Computer Science &amp; Engineering</option><option value="189">UniKL MIAT - Universiti Kuala Lumpur Malaysian Institute of Aviation Technology</option><option value="190">UCAM - University College of Agroscience Malaysia</option><option value="191">UCSI College</option><option value="192">UC Bestari - University College Bestari</option><option value="193">UNITI College</option><option value="194">Unikop College</option><option value="195">UNDO Academy</option><option value="196">University of London International Programmes</option><option value="197">Universiti Tunku Abdul Rahman (UTAR) Sungai Long</option><option value="198">Universiti Tunku Abdul Rahman (UTAR) Kampar</option><option value="199">Vision College</option><option value="200">Victoria International College</option><option value="201">VTAR Institute</option><option value="202">Widad University College</option><option value="203">WOU - Wawasan Open University</option><option value="204">Widad College</option><option value="205">XMUMC - Xiamen University Malaysia Campus</option><option value="206">YTL International College of Hotel Management</option><option value="207">YPC International College</option><option value="208">Young Aces Technical College</option><option value="others">Others</option>

                                                        </select>

                                                    </div>
                                                    <div class="form-group">
                                                    <input type="text" class="form-control hide " id="others-uni-edit"  name="others-uni-edit" placeholder="Please state your institute/university name">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="val-email">Qualification<span class="text-danger">*</span></label>
                                                        <select class="form-control" id="qualification-edit" name="qualification-edit" aria-describedby="val-specialization-error" aria-invalid="true" style="width: 60%;
">
                                                            <option value="0" title="- Select Qualification -&quot;, &quot;0&quot;, ">- Select Qualification -</option>
                                                            <option value="1" title="Primary/Secondary School/SPM/'O' Level">Primary/Secondary School/SPM/'O' Level</option>
                                                            <option value="2" title="Higher Secondary/STPM/'A' Level/Pre-U">Higher Secondary/STPM/'A' Level/Pre-U</option>
                                                            <option value="3" title="Professional Certificate">Professional Certificate</option>
                                                            <option value="4" title="Diploma">Diploma</option>
                                                            <option value="5" title="Advanced/Higher/Graduate Diploma">Advanced/Higher/Graduate Diploma</option>
                                                            <option value="6" title="Bachelor's Degree">Bachelor's Degree</option>
                                                            <option value="7" title="Post Graduate Diploma">Post Graduate Diploma</option>
                                                            <option value="8" title="Professional Degree">Professional Degree</option>
                                                            <option value="9" title="Master's Degree">Master's Degree</option>
                                                            <option value="10" title="Doctorate (PhD)">Doctorate (PhD)</option>
                                                        </select>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="val-password">Graduation Date <span class="text-danger">*</span></label>
                                                        <input type="text" class="js-datepicker form-control-date" id="graduation-date-edit" name="graduation-date-edit" data-week-start="1" data-autoclose="false" data-today-highlight="true" data-date-format="dd/mm/yyyy" placeholder="dd/mm/yyyy">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="val-email">Institute/University country<span class="text-danger">*</span></label>

                                                    <select class="form-control" id="country-institute-edit" name="country-institute-edit" aria-describedby="val-specialization-error" aria-invalid="true" style="width: 60%;
"><option disabled="" selected="" value="0">select country</option> <option value="1">Afghanistan</option><option value="2">Albania</option><option value="3">Algeria</option><option value="4">American Samoa</option><option value="5">Andorra</option><option value="6">Angola</option><option value="7">Anguilla</option><option value="8">Antarctica</option><option value="9">Antigua And Barbuda</option><option value="10">Argentina</option><option value="11">Armenia</option><option value="12">Aruba</option><option value="13">Australia</option><option value="14">Austria</option><option value="15">Azerbaijan</option><option value="16">Bahamas The</option><option value="17">Bahrain</option><option value="18">Bangladesh</option><option value="19">Barbados</option><option value="20">Belarus</option><option value="21">Belgium</option><option value="22">Belize</option><option value="23">Benin</option><option value="24">Bermuda</option><option value="25">Bhutan</option><option value="26">Bolivia</option><option value="27">Bosnia and Herzegovina</option><option value="28">Botswana</option><option value="29">Bouvet Island</option><option value="30">Brazil</option><option value="31">British Indian Ocean Territory</option><option value="32">Brunei</option><option value="33">Bulgaria</option><option value="34">Burkina Faso</option><option value="35">Burundi</option><option value="36">Cambodia</option><option value="37">Cameroon</option><option value="38">Canada</option><option value="39">Cape Verde</option><option value="40">Cayman Islands</option><option value="41">Central African Republic</option><option value="42">Chad</option><option value="43">Chile</option><option value="44">China</option><option value="45">Christmas Island</option><option value="46">Cocos (Keeling) Islands</option><option value="47">Colombia</option><option value="48">Comoros</option><option value="49">Republic Of The Congo</option><option value="50">Democratic Republic Of The Congo</option><option value="51">Cook Islands</option><option value="52">Costa Rica</option><option value="53">Cote D'Ivoire (Ivory Coast)</option><option value="54">Croatia (Hrvatska)</option><option value="55">Cuba</option><option value="56">Cyprus</option><option value="57">Czech Republic</option><option value="58">Denmark</option><option value="59">Djibouti</option><option value="60">Dominica</option><option value="61">Dominican Republic</option><option value="62">East Timor</option><option value="63">Ecuador</option><option value="64">Egypt</option><option value="65">El Salvador</option><option value="66">Equatorial Guinea</option><option value="67">Eritrea</option><option value="68">Estonia</option><option value="69">Ethiopia</option><option value="70">External Territories of Australia</option><option value="71">Falkland Islands</option><option value="72">Faroe Islands</option><option value="73">Fiji Islands</option><option value="74">Finland</option><option value="75">France</option><option value="76">French Guiana</option><option value="77">French Polynesia</option><option value="78">French Southern Territories</option><option value="79">Gabon</option><option value="80">Gambia The</option><option value="81">Georgia</option><option value="82">Germany</option><option value="83">Ghana</option><option value="84">Gibraltar</option><option value="85">Greece</option><option value="86">Greenland</option><option value="87">Grenada</option><option value="88">Guadeloupe</option><option value="89">Guam</option><option value="90">Guatemala</option><option value="91">Guernsey and Alderney</option><option value="92">Guinea</option><option value="93">Guinea-Bissau</option><option value="94">Guyana</option><option value="95">Haiti</option><option value="96">Heard and McDonald Islands</option><option value="97">Honduras</option><option value="98">Hong Kong S.A.R.</option><option value="99">Hungary</option><option value="100">Iceland</option><option value="101">India</option><option value="102">Indonesia</option><option value="103">Iran</option><option value="104">Iraq</option><option value="105">Ireland</option><option value="106">Israel</option><option value="107">Italy</option><option value="108">Jamaica</option><option value="109">Japan</option><option value="110">Jersey</option><option value="111">Jordan</option><option value="112">Kazakhstan</option><option value="113">Kenya</option><option value="114">Kiribati</option><option value="115">Korea North</option><option value="116">Korea South</option><option value="117">Kuwait</option><option value="118">Kyrgyzstan</option><option value="119">Laos</option><option value="120">Latvia</option><option value="121">Lebanon</option><option value="122">Lesotho</option><option value="123">Liberia</option><option value="124">Libya</option><option value="125">Liechtenstein</option><option value="126">Lithuania</option><option value="127">Luxembourg</option><option value="128">Macau S.A.R.</option><option value="129">Macedonia</option><option value="130">Madagascar</option><option value="131">Malawi</option><option value="132">Malaysia</option><option value="133">Maldives</option><option value="134">Mali</option><option value="135">Malta</option><option value="136">Man (Isle of)</option><option value="137">Marshall Islands</option><option value="138">Martinique</option><option value="139">Mauritania</option><option value="140">Mauritius</option><option value="141">Mayotte</option><option value="142">Mexico</option><option value="143">Micronesia</option><option value="144">Moldova</option><option value="145">Monaco</option><option value="146">Mongolia</option><option value="147">Montserrat</option><option value="148">Morocco</option><option value="149">Mozambique</option><option value="150">Myanmar</option><option value="151">Namibia</option><option value="152">Nauru</option><option value="153">Nepal</option><option value="154">Netherlands Antilles</option><option value="155">Netherlands The</option><option value="156">New Caledonia</option><option value="157">New Zealand</option><option value="158">Nicaragua</option><option value="159">Niger</option><option value="160">Nigeria</option><option value="161">Niue</option><option value="162">Norfolk Island</option><option value="163">Northern Mariana Islands</option><option value="164">Norway</option><option value="165">Oman</option><option value="166">Pakistan</option><option value="167">Palau</option><option value="168">Palestinian Territory Occupied</option><option value="169">Panama</option><option value="170">Papua new Guinea</option><option value="171">Paraguay</option><option value="172">Peru</option><option value="173">Philippines</option><option value="174">Pitcairn Island</option><option value="175">Poland</option><option value="176">Portugal</option><option value="177">Puerto Rico</option><option value="178">Qatar</option><option value="179">Reunion</option><option value="180">Romania</option><option value="181">Russia</option><option value="182">Rwanda</option><option value="183">Saint Helena</option><option value="184">Saint Kitts And Nevis</option><option value="185">Saint Lucia</option><option value="186">Saint Pierre and Miquelon</option><option value="187">Saint Vincent And The Grenadines</option><option value="188">Samoa</option><option value="189">San Marino</option><option value="190">Sao Tome and Principe</option><option value="191">Saudi Arabia</option><option value="192">Senegal</option><option value="193">Serbia</option><option value="194">Seychelles</option><option value="195">Sierra Leone</option><option value="196">Singapore</option><option value="197">Slovakia</option><option value="198">Slovenia</option><option value="199">Smaller Territories of the UK</option><option value="200">Solomon Islands</option><option value="201">Somalia</option><option value="202">South Africa</option><option value="203">South Georgia</option><option value="204">South Sudan</option><option value="205">Spain</option><option value="206">Sri Lanka</option><option value="207">Sudan</option><option value="208">Suriname</option><option value="209">Svalbard And Jan Mayen Islands</option><option value="210">Swaziland</option><option value="211">Sweden</option><option value="212">Switzerland</option><option value="213">Syria</option><option value="214">Taiwan</option><option value="215">Tajikistan</option><option value="216">Tanzania</option><option value="217">Thailand</option><option value="218">Togo</option><option value="219">Tokelau</option><option value="220">Tonga</option><option value="221">Trinidad And Tobago</option><option value="222">Tunisia</option><option value="223">Turkey</option><option value="224">Turkmenistan</option><option value="225">Turks And Caicos Islands</option><option value="226">Tuvalu</option><option value="227">Uganda</option><option value="228">Ukraine</option><option value="229">United Arab Emirates</option><option value="230">United Kingdom</option><option value="231">United States</option><option value="232">United States Minor Outlying Islands</option><option value="233">Uruguay</option><option value="234">Uzbekistan</option><option value="235">Vanuatu</option><option value="236">Vatican City State (Holy See)</option><option value="237">Venezuela</option><option value="238">Vietnam</option><option value="239">Virgin Islands (British)</option><option value="240">Virgin Islands (US)</option><option value="241">Wallis And Futuna Islands</option><option value="242">Western Sahara</option><option value="243">Yemen</option><option value="244">Yugoslavia</option><option value="245">Zambia</option><option value="246">Zimbabwe</option></select>

                                                    </div>
                                                    {{--<div class="form-group">--}}
                                                    {{--<label for="val-email">CGPA<span class="text-danger"></span></label>--}}
                                                    {{--<input type="text" class="CGPA" id="add-major" name="add-major" placeholder="">--}}
                                                    {{--</div>--}}



                                                    <div class="form-group">
                                                        <label for="val-email">Academic Field<span class="text-danger">*</span></label>
                                                        <select class="form-control" id="field-edit" name="field-edit" aria-describedby="val-specialization-error" aria-invalid="true">
                                                            <option disabled="" selected="" value="0">-select course-</option>
                                                            <option value="1">Applied sciences</option>
                                                            <option value="2">Humanities</option>
                                                            <option value="3">Natural sciences/ Pure sciences</option>
                                                            <option value="4">Social sciences</option>
                                                            <option value="Others">Others</option>
                                                        </select>
                                                    </div>

                                                    <div id="keyword-job-specification" class="form-group ">
                                                        <label for="val-email">Course<span class="text-danger">*</span></label>
                                                        <select class="form-control" id="course-edit" name="course-edit" aria-describedby="val-specialization-error" aria-invalid="true">
                                                            <option disabled="" selected="" value="0">select course field</option>

                                                        </select>
                                                    </div>



                                                    <div class="form-group">
                                                        <label for="val-email">Major<span class="text-danger">*</span></label>
                                                        <input type="text" class="form-control" id="major-edit" name="major-edit" placeholder="">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="val-email">Grade<span class="text-danger"></span></label>
                                                        <select class="form-control" id="grade-edit" name="grade-edit" aria-describedby="val-specialization-error" aria-invalid="true">
                                                            <option disabled="" selected="" value="0">select Grades </option>
                                                            <option value="A">Grade A</option>
                                                            <option value="B">Grade B</option>
                                                            <option value="C">Grade C</option>
                                                            <option value="D">Grade D</option>
                                                            <option value="1st">1st Class </option>
                                                            <option value="2ndUP">2nd Class Upper </option>
                                                            <option value="2ndLOW">2nd Class Lower </option>
                                                            <option value="3rd">3rd Class </option>
                                                            <option value="CGPA">CGPA/Percentage</option>
                                                            <option value="1sd">Pass/Non-gradable</option>
                                                            <option value="Fail">Fail</option>
                                                            <option value="Inc">Incomplete</option>
                                                            <option value="Ongoing">On-going</option>
                                                        </select>
                                                    </div>

                                                    <div id="cgpa-edit-div" class="form-group hide">
                                                        <label for="val-email">CGPA<span class="text-danger"></span></label>
                                                        <input type="text" class="form-control-cgpa" id="cgpa-edit" name="cgpa-edit" placeholder="">
                                                    </div>


                                                    <div class="form-group">
                                                        <label for="val-email">Additional Information<span class="text-danger">*</span></label>
                                                        <textarea class="form-control" id="information-edit" name="information-edit" rows="4" placeholder="Describe your experience "></textarea>
                                                    </div>




                                                </div>
                                            </div>
                                        </div>
                                        <!-- END Regular -->



                                        <!-- Submit -->
                                        <div class="row items-push">
                                            <div class="col-lg-7 offset-lg-4 submit-education-edit">
                                                <button type="submit" class="btn btn-primary submit-education-edit">Submit</button>
                                            </div>
                                        </div>
                                        <!-- END Submit -->
                                    </div>
                                </div>
                            </form>


                            <!-- jQuery Validation -->
                        </div>
                        <div class="modal-footer">



                            <button type="button" class="btn btn-warning" data-dismiss="modal">
                                <span class="glyphicon glyphicon"></span>close
                            </button>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection
