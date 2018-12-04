@extends('layouts/main-app')

@section('content')

<!-- Page Content -->
<div class="content" >
    <!-- jQuery Validation (.js-validation class is initialized in js/pages/be_forms_validation.min.js which was auto compiled from _es6/pages/be_forms_validation.js) -->
    <!-- For more examples you can check out https://github.com/jzaefferer/jquery-validation -->

        <div class="block block-rounded block-bordered">
            <div class="block-header block-header-default">
                <h3 class="block-title"><i class="nav-main-link-icon fa fa-address-card"></i> &nbsp;Personality Test</h3>
            </div>
            <div class="block-content block-content-full">
            
            
<form action="/personality/personality_career" method="post">
<button>Test</button>
</form>


    <script src="https://cdn.traitify.com/js/widgets/v1.js"></script>

    <div class="assessment"></div>
    
    <script>
      Traitify.setPublicKey("26613025d5214b2e9ab40d71d180b27b");
      Traitify.setHost("https://api-sandbox.traitify.com");
      Traitify.setVersion("v1");
      var assessmentId = '8988c712-7e87-46c4-ac60-d98eba243a2e';
      Traitify.ui.load(assessmentId, ".assessment")
    </script>



            </div>
        </div>

    <!-- jQuery Validation -->
</div>
<!-- END Page Content -->



@endsection