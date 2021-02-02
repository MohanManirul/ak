

<script type="text/javascript">
    $(function(){
        $("#addStudentForm").on("submit" , function(e){
            e.preventDefault();

            var form = $(this);
            var url = form.attr("action");
            var type = form.attr("method");
            //console.log(url + "--" +type);
            var data = form.serialize();

            $.ajax({
                url :url ,
                data : data,
                type: type ,
                dataType :"JSON" ,
                beforeSend:function(){
                    $(".load").fadeIn();
                },
                success: function(data){
                    if (data == "success") {
                        swal("Great" , "Successfully data added" , "success");
                    }
                },
                complete:function(){
                    $(".load").fadeOut();
                },
            })

        });
    });


</script>
<script type="text/javascript">
        
// student session 
    $(function(){
        $("#addStudentSession").on("submit" , function(e){
            e.preventDefault();

            var form = $(this);
            var url = form.attr("action");
            var type = form.attr("method");
            //console.log(url + "--" +type);
            var data = form.serialize();

            $.ajax({
                url :url ,
                data : data,
                type: type ,
                dataType :"JSON" ,
                beforeSend:function(){
                    $(".load").fadeIn();
                },
                success: function(data){
                    if (data == "success") {
                        swal("Great" , "Successfully data added" , "success");

                    }
                },
                complete:function(){
                    $(".load").fadeOut();
                },
            })

        });
    });
</script>

<!--- addeventmore ----->
    <script type="text/javascript">
        $(document).ready(function(){
            var counter = 0 ;
            $(document).on("click" , ".addeventmore" ,function(){
                var whole_extra_iten_add = $("#whole_extra_iten_add").html();
                $(this).closest(".add_item").append(whole_extra_iten_add);
                counter++;
            });
            $(document).on("click" , ".removeeventmore" , function(event){
                $(this).closest(".delete_whole_extra_iten_add").remove();
                counter -=1 
            });
        });

    </script>
<!--- addeventmore ----->

<script type="text/javascript">
      $("#addFeeAmount").validate({
                rules:{
                    "fee_category_id[]" :{
                        required: true,
                    },
                    "class_id[]" :{
                        required: true,
                    },
                    "amount[]" :{
                        required: true,
                    }
                },
                messages:{

                },
                errorElement:'span',
                errorPlacement:function(error,element){
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight:function(element, errorClass ,valiClass){
                    $(element).addClass('is-invalid');
                },
                unhilight:function(element, errorClass ,valiClass){
                    $(element).removeClass('is-valid');
                }
            });
</script>
<!--- date range picker ---->
<script type="text/javascript">
    $(function(){
        $('.singledatepicker').daterangepicker({
            singleDatePicker:true,
            showDropdown:true,
            autoUpdateInput:false,
            autoApply:true,
            locate: {
                format:'DD-MM-YYYY',
                daysOfWeek:['Sa' , 'Su' , 'Mo' , 'Tu' , 'We' , 'Th' , 'Fr'],
                firstDay:0
            },
            minDay: '01/01/1930',
        },
        function(start){
            this.element.val(start.format('DD-MM-YYYY'));
            this.element.parent().removeClass('has-error');

        },
        function(choose_date){
            this.element.val(choose_date.format('DD-MM-YYYY'));
        });
        $('.singledatepicker').on('apply.daterangepicker', function(ev,picker){
            $(this).val(picker.startDate.format('DD-MM-YYYY'));
            $(this).trigger('change');
        });
    });
        
</script>
<!--- date range picker ---->

<!--- image ---->
<script type="text/javascript">
    $(document).ready(function(){
        $('#image').change(function(e){
            var reader = new FileReader();
            render.onload = function(e){
                $('#showImage').attr('src',e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });
</script>
<!--- image ---->.

<!---- form validation ---->
    <script type="text/javascript">
        $(document).ready(function(){
            $('#addStudentForm').validate({
                rules:{
                    session_id : {
                        required:true,
                    },
                    class_id : {
                        required:true,
                    }

                },
                messages:{
                    
                }
            });
        });
    </script>
<!---- form validation ---->

<!--- view roll generate ---->
 <script type="text/javascript">
        $(document).ready(function(){
            $(document).on('click','#search',function(){
                var session_id = $("#session_id").val();
                var class_id = $("#class_id").val();
                $('.notifyjs-corner').html();
                if (session_id== '') {
                    $.notify("Session required", {globalPosition:'top right',className: 'error'});
                    return false;
                } 
                if (class_id== '') {
                    $.notify("Session required", {globalPosition:'top right',className: 'error'});
                    return false;
                }
                $.ajax({
                    url:"{{route('student.roll.get-student')}}",
                    type:"GET",
                    data:{'session_id': session_id , 'class_id': class_id},
                    success: function(data){
                       $('#roll-generate').removeClass('d-none');
                       var html = '';
                       $.each(data ,function(key,v){
                        html +=
                        '<tr>'+
                            '<td>'+v.student.id_no+'<input type="hidden" name="student_id[]" value = "'+v.student_id+'"></td>'+
                            '<td>'+v.student.name+'</td>'+
                            '<td>'+v.student.fname+'</td>'+
                            '<td>'+v.student.gender+'</td>'+
                            '<td><input type="text" class="form-control form-control-sm" name="roll[]" value="'+v.roll+'"></td>'+

                        '</tr>';
                       });
                       html = $('#roll-generate-tr').html(html); 
                    }
                });

                //console.log(session_id + "--" +class_id);

            });
        });  
     </script>
<!--- view roll generate ---->

<!--- registration fee ---->
 <script type="text/javascript">
        $(document).ready(function(){
            $(document).on('click','#searchrfee',function(){
                var session_id = $("#session_id").val();
                var class_id = $("#class_id").val();
                $('.notifyjs-corner').html();
                if (session_id== '') {
                    $.notify("Session required", {globalPosition:'top right',className: 'error'});
                    return false;
                } 
                if (class_id== '') {
                    $.notify("Session required", {globalPosition:'top right',className: 'error'});
                    return false;
                }
                $.ajax({
                    url:"{{route('student.reg_fee.get_student')}}",
                    type:'get',
                    data:{'session_id':session_id, 'class_id':class_id},
                    beforeSend:function(){

                    },
                    success:function(data){
                        var source = $("#document-template").html();
                        var template = Handlebars.compile(source);
                        var html = template(data);
                        $('#DocumentResults').html(html);
                        $('[data-toggle = "tooltip"]').tooltip();
                    }


                });
            });
        });  
     </script>
<!--- registration fee ---->

<!--- monthly fee ---->
 <script type="text/javascript">
        $(document).ready(function(){
            $(document).on('click','#searchmfee',function(){
                var session_id = $("#session_id").val();                
                var class_id = $("#class_id").val();
                var month = $("#month").val();
                $('.notifyjs-corner').html();
                if (session_id== '') {
                    $.notify("Session required", {globalPosition:'top right',className: 'error'});
                    return false;
                } 
                if (class_id== '') {
                    $.notify("Session required", {globalPosition:'top right',className: 'error'});
                    return false;
                }
                 if (month== '') {
                    $.notify("Session required", {globalPosition:'top right',className: 'error'});
                    return false;
                }
                $.ajax({
                    url:"{{route('student.monthly_fee.get_student')}}",
                    type:'get',
                    data:{'session_id':session_id, 'class_id':class_id, 'month':month},
                    beforeSend:function(){

                    },
                    success:function(data){
                        var source = $("#document-template").html();
                        var template = Handlebars.compile(source);
                        var html = template(data);
                        $('#DocumentResults').html(html);
                        $('[data-toggle = "tooltip"]').tooltip();
                    }


                });
            });
        });  
     </script>
<!--- monthly fee ---->

<!--- exam fee ---->
 <script type="text/javascript">
        $(document).ready(function(){
            $(document).on('click','#searchefee',function(){
                var session_id = $("#session_id").val();                
                var class_id = $("#class_id").val();
                var exam_type_id = $("#exam_type_id").val();
                $('.notifyjs-corner').html();
                if (session_id== '') {
                    $.notify("Session required", {globalPosition:'top right',className: 'error'});
                    return false;
                } 
                if (class_id== '') {
                    $.notify("Session required", {globalPosition:'top right',className: 'error'});
                    return false;
                }
                 if (exam_type_id== '') {
                    $.notify("Exam Type required", {globalPosition:'top right',className: 'error'});
                    return false;
                }
                $.ajax({
                    url:"{{route('student.exam_fee.get_student')}}",
                    type:'get',
                    data:{'session_id':session_id, 'class_id':class_id, 'exam_type_id':exam_type_id},
                    beforeSend:function(){

                    },
                    success:function(data){
                        var source = $("#document-template").html();
                        var template = Handlebars.compile(source);
                        var html = template(data);
                        $('#DocumentResults').html(html);
                        $('[data-toggle = "tooltip"]').tooltip();
                    }


                });
            });
        });  
     </script>
<!--- exam fee ---->

<!------validating & generating roll -------->
<script type="text/javascript">
    $(document).ready(function(){
        $('#rollGenerate').validate({
            rules:{
                "roll[]":{
                    required:true,
                }
            },
            messages:{

            },
            errorElement:'span',
            errorPlacement: function(error,element){
                error.addClass('Invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight:function(element , errorclass,validClass){
                $(element).addClass('is-invalid');
            },
            unhighlight:function(element , errorclass,validClass){
                $(element).removeClass('is-invalid');
            }

           
        });
    });
</script>
<!------validating & generating roll -------->

<!----Employee form validation ---->
   <script type="text/javascript">
    $(document).ready(function(){
        $('#addEmployeeForm').validate({
            rules:{
                "name":{
                    required:true,
                },
                "fname":{
                    required:true,
                }, 
                "mname":{
                    required:true,
                }, 
                "dob":{
                    required:true,
                }, 
                "mobile":{
                    required:true,
                },
                "address":{
                    required:true,
                },
                "email":{
                    required:true,
                }, 
                "gender":{
                    required:true,
                }, 
                "religion":{
                    required:true,
                }, 
                "dob":{
                    required:true,
                }, 
                "join_date":{
                    required:true,
                }, 
                "salary":{
                    required:true,
                }, 
                "designation_id":{
                    required:true,
                },
            },
            messages:{

            },
            errorElement:'span',
            errorPlacement: function(error,element){
                error.addClass('Invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight:function(element , errorclass,validClass){
                $(element).addClass('is-invalid');
            },
            unhighlight:function(element , errorclass,validClass){
                $(element).removeClass('is-invalid');
            }

           
        });
    });
</script>
<!----Employee form validation ---->

<!----Employee Salary form validation ---->
   <script type="text/javascript">
    $(document).ready(function(){
        $('#salary_increment').validate({
            rules:{
                "incement_salary":{
                    required:true,
                },
                "effected_date":{
                    required:true,
                }, 
            },
            messages:{

            },
            errorElement:'span',
            errorPlacement: function(error,element){
                error.addClass('Invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight:function(element , errorclass,validClass){
                $(element).addClass('is-invalid');
            },
            unhighlight:function(element , errorclass,validClass){
                $(element).removeClass('is-invalid');
            }

           
        });
    });
</script>
<!----Employee Salary form validation ---->

<!----Employee Leave form validation ---->
   <script type="text/javascript">
    $(document).ready(function(){
        $('#employee_leave').validate({
            rules:{
                "incement_salary":{
                    required:true,
                },
                "effected_date":{
                    required:true,
                }, 
            },
            messages:{

            },
            errorElement:'span',
            errorPlacement: function(error,element){
                error.addClass('Invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight:function(element , errorclass,validClass){
                $(element).addClass('is-invalid');
            },
            unhighlight:function(element , errorclass,validClass){
                $(element).removeClass('is-invalid');
            }

           
        });
    });
</script>
<!----Employee Leave form validation ---->

<!---- Employee Leave new Reason -------->
    <script type="text/javascript">
        $(document).ready(function(){
            $(document).on('change','#leave_purpose_id',function(){
                var leave_purpose_id = $(this).val();
                if(leave_purpose_id == '0'){
                    $('#add_others').show();
                }else{
                    $('#add_others').hide();
                }
            });
        });
    </script>
<!---- Employee Leave new Reason -------->