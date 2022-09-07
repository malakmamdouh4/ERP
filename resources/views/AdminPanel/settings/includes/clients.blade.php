<!-- form -->
<div class="row">


    
   <!-- client -->
   <div class="divider">
        <div class="divider-text">{{trans('common.clients')}}</div>
    </div>

    
        <div class="row pt-2 pb-4">
            <div class="repeatableFeatures col-sm-12">
                @if(getSettingValue('clients') != '')
                    @foreach($clients->valueArray() as $index => $value)
                        <div class="More row">
                            <div class="col-12 col-md-5 mb-2">
                                <label class="form-label">اسم العميل</label>
                                {{ Form::text('clients[]',$value['name'],array('id'=>'clients','class'=>'form-control')) }}
                            </div>
                            <div class="col-md-5 mb-2">
                                <label class="form-label">لوجو العميل</label>
                                <input class="form-control" name="clientsPhotos[]" type="file">
                            </div>

                            @if($index > 0)
                                <div class="col-1 col-md-2 mt-2 mb-2">
                                    <span class="delete btn btn-danger">
                                        حذف
                                    </span>
                                </div>
                            @endif
                        </div>
                    @endforeach
                @else
                    <div class="row">
                        <div class="col-12 col-md-5 mb-2">
                            <label class="form-label">الاسم</label>
                            {{ Form::text('clients[]','',array('id'=>'clients','class'=>'form-control')) }}
                        </div>
                        <div class="col-md-5 mb-2">
                            <label class="form-label">لوجو العميل</label>
                            <input class="form-control" name="clientsPhotos[]" type="file">
                        </div>
                    </div>
                @endif
            </div>
            <div class="col-12 mt-2">
                <span class="add_Feature btn btn-sm btn-primary">أضف جديد</span>
            </div>

        </div>


</div>
<!--/ form -->



@section('scripts')
    <script type="text/template" id="RepeatFeatureTPL">
        <div class="More row">
            <div class="col-12 col-md-5 mb-2">
                <label class="form-label">الاسم</label>
                {{ Form::text('clients[]','',array('id'=>'clients','class'=>'form-control')) }}
            </div>
            <div class="col-md-5 mb-2">
                <label class="form-label">لوجو العميل</label>
                <input class="form-control" name="clientsPhotos[]" type="file">
            </div>

            <div class="col-1 col-md-2 mt-2">
                <span class="delete btn btn-danger">
                    حذف
                </span>
            </div>
        </div>
    </script>

    <script type="text/javascript">
        $(document).ready(function() {

            var max_fields          = 50;
            var wrapper             = $(".repeatableFeatures");
            var add_button          = $(".add_Feature");
            var wrapperNew             = $(".repeatableNewFeatures");
            var add_buttonNew          = $(".add_NewFeature");
            var RepeatOpponentTPL   = $("#RepeatFeatureTPL").html();

            var x = 1;
            $(add_button).click(function(e){
                e.preventDefault();
                if(x < max_fields){
                    x++;
                    $(wrapper).append(RepeatOpponentTPL); //add input box
                }else{
                    alert('You Reached the limits')
                }
            });
            $(add_buttonNew).click(function(e){
                e.preventDefault();
                if(x < max_fields){
                    x++;
                    $(wrapperNew).append(RepeatOpponentTPL); //add input box
                }else{
                    alert('You Reached the limits')
                }
            });

            $(wrapper).on("click",".delete", function(e){
                e.preventDefault(); $(this).closest('.More').remove(); x--;
            });
            
            $(wrapperNew).on("click",".delete", function(e){
                e.preventDefault(); $(this).closest('.More').remove(); x--;
            });

        });
    </script>

@stop
