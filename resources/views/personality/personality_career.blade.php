@extends('layouts/main-app')

@section('content')

<!-- Page Content -->
<div class="content" >
    <!-- jQuery Validation (.js-validation class is initialized in js/pages/be_forms_validation.min.js which was auto compiled from _es6/pages/be_forms_validation.js) -->
    <!-- For more examples you can check out https://github.com/jzaefferer/jquery-validation -->

        <div class="block block-rounded block-bordered">
            <div class="block-header block-header-default">
                <h3 class="block-title"><i class="nav-main-link-icon fa fa-address-card"></i> &nbsp;Career Assessment</h3>
            </div>
            <div class="block-content block-content-full">
            



@forelse($personalities as $personality)

    <script src="https://cdn.traitify.com/js/widgets/v1.js"></script>

    <div class="assessment"></div>
    
    <script>
      Traitify.setPublicKey("26613025d5214b2e9ab40d71d180b27b");
      Traitify.setHost("https://api.traitify.com");
      Traitify.setVersion("v1");
      //var assessmentId = '9c63eff0-affa-48ee-a3a6-0a468612150b';
	  var assessmentId = '{{ $personality->assessment_id }}';
      Traitify.ui.load(assessmentId, ".assessment")
    </script>
    
<br>
<div align="center">
	<h2>Did you feel like this personality results match you?</h2>

    <div class="mb-4">
        <table>
            <tr>
                <td>
                    <form action="/personality/personality_career_getdata" method="post">
                    <input type="hidden" name="assessment_id" value="{{ $personality->assessment_id }}"/>
                    <button type="submit" class="btn btn-primary mr-1 mb-3">Yes, it's describe me</button>
                    </form>
                </td>
                <td>        
                    <form action="/personality/personality_career" method="post">
                    <button type="submit" class="btn btn-danger mr-1 mb-3">No, reset assessment</button>
                    </form>
                </td>
            </tr>
        </table>
    </div>

</div>


@empty

<div align="center">
	<h2>Are you ready to know your career strength?</h2>

    <div class="mb-4">
        <form action="/personality/personality_career" method="post">
        <button type="submit" class="btn btn-primary">Start Your Career Assessment</button>
        </form>
    </div>

</div>



@endforelse
            







            </div>
        </div>

    <!-- jQuery Validation -->
</div>
<!-- END Page Content -->



@endsection