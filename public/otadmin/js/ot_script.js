$(document).ready(function(){
    $('.check-all').click(function() {  //on click
        if(this.checked) { // check select status
            $('.checkbox-list').each(function() { //loop through each checkbox
                this.checked = true;  //select all checkboxes with class "checkbox1"
            });
        }else{
            $('.checkbox-list').each(function() { //loop through each checkbox
                this.checked = false; //deselect all checkboxes with class "checkbox1"
            });
        }
    });
    $('html').bind('keypress', function(e)
    {
        if(e.keyCode == 13)
        {
            return false;
        }
    });
    $('#del-all').click(function(){
        if($('.check-all').is(':checked') || $('.checkbox-list').is(':checked')) {
            var control = $(this).attr('data-control');
            swal({title: "Bạn có chắc?",showCancelButton: true,

            }
            , function(isConfirm){
                if (isConfirm) {
                    var listid="";
                    $("input[name='chon']").each(function(){
                    if(this.checked){
                      $(this).parent().parent().parent().fadeOut();
                      listid = listid+","+this.value;
                    }
                    })
                    listid=listid.substr(1);
                    if(listid != '')
                    {
                        $.ajax
                        ({
                         method: "POST",
                         url: "otadmin/"+control+"/deleteall",
                         data: { listid:listid},
                        });
                        swal("Chúc mừng!", "Xóa thành công.", "success");
                    }
                } else {
                    swal("Dữ liệu của bạn đã không bị xóa!");
                }
            });
        }else{
          swal('Vui lòng chọn đối tượng bạn muốn thao tác!!');
        }
    });
});
function del(id) {
    swal({title: "Bạn có chắc?",showCancelButton: true, }
    , function(isConfirm){
        if (isConfirm) {
            $('.delete'+id).parent().parent().fadeOut();
            var control = $('.delete'+id).attr('data-control');
            if(id != '')
            {
                $.ajax
                ({
                    method: "POST",
                    url: "otadmin/"+control+"/delete",
                    data: { id:id},
                });
            }
        }else{
            swal("Dữ liệu của bạn đã không bị xóa!");
        }
    });
}
//Thế Hợp check show globals
function checkShowGlobals(id,properties){
    var control = $('.'+properties+id).attr('data-control');
    var globals = 0;
    if($('.' + properties + id).is(':checked')){ globals = 1; }
    if(id != '')
    {
        $.ajax
        ({
            method: "POST",
            url: "otadmin/"+control+"/showGlobals",
            data: { id:id, globals:globals, properties:properties},
        });
    }
}
function createSlug(slug){
    var slug = slug.value;
    var control = $('#name').attr('data-control');
    if(slug)
    {
        $.ajax
        ({
            method: "POST",
            url: "otadmin/"+control+"/createSlug",
            data: { slug:slug},
            dataType: "json",
            success: function(data){
                if(data.slug){
                    $('#alias').val(data.slug);
                }
            }
        });
    }
}

function changeSort(sort,id){
    var control = $('.publish'+id).attr('data-control');
    var sort = sort.value;
    console.log(control);
    console.log(sort);
    if(id != '')
    {
        $.ajax
        ({
            method: "POST",
            url: "otadmin/"+control+"/sort",
            data: { id:id,sort:sort},
            dataType: "json",
            success: function(data){
                if(data.rs == 1){
                    $.toast({
                        text: 'Cập nhật thứ tứ thành công!',
                        position: 'top-right',
                        loaderBg: '#ff6849',
                        icon: 'success',
                        hideAfter: 3000,
                        stack: 6
                    });
                }
            }
        });
    }
}
function changeSort2(sort,id){
    var control = $('.sort'+id).attr('data-control');
    var sort = sort.value;
    if(id != '')
    {
        $.ajax
        ({
            method: "POST",
            url: "otadmin/"+control+"/sort",
            data: { id:id,sort:sort},
            dataType: "json",
            success: function(data){
                if(data.rs == 1){
                    $.toast({
                        text: 'Cập nhật thứ tứ thành công!',
                        position: 'top-right',
                        loaderBg: '#ff6849',
                        icon: 'success',
                        hideAfter: 3000,
                        stack: 6
                    });
                }
            }
        });
    }
}
function loadCity(country_id){
    var country_id = country_id.value;
    if(country_id != ''){
        $('#city_id').html('<option>Loading.....</option>');
        $.ajax
        ({
            method: "POST",
            url: "otadmin/ajax/loadcity",
            data: { country_id:country_id},
            dataType: "html",
            success: function(data){
                if(data != ''){
                  $('#city_id').html(data);
                }else{
                  $('#city_id').html('');
                }
            }
        });
    }
}
function loadDistrict(city_id){
    var city_id = city_id.value;
    if(city_id != ''){
        $('#district_id').html('<option>Loading.....</option>');
        $.ajax
        ({
            method: "POST",
            url: "otadmin/ajax/loaddistrict",
            data: { city_id:city_id},
            dataType: "html",
            success: function(data){
                if(data != ''){
                  $('#district_id').html(data);
                }else{
                  $('#district_id').html('');
                }
            }
        });
    }
}
function FormatNumber(num)
{
    var pattern = "0123456789.";
    var len = num.value.length;
    if (len != 0)
    {
        var index = 0;

        while ((index < len) && (len != 0))
            if (pattern.indexOf(num.value.charAt(index)) == -1)
            {
                if (index == len-1)
                    num.value = num.value.substring(0, len-1);
                else if (index == 0)
                        num.value = num.value.substring(1, len);
                     else num.value = num.value.substring(0, index)+num.value.substring(index+1, len);
                index = 0;
                len = num.value.length;
            }
            else index++;
    }
    val = num.value;
    val = val.replace(/[^\d.]/g,"");
    arr = val.split('.');
    lftsde = arr[0];
    rghtsde = arr[1];
    result = "";
    lng = lftsde.length;
    j = 0;
    for (i = lng; i > 0; i--){
        j++;
        if (((j % 3) == 1) && (j != 1)){
            result = lftsde.substr(i-1,1) + "," + result;
        }else{
            result = lftsde.substr(i-1,1) + result;
        }
    }
    if(rghtsde==null){
        num.value = result;
    }else{
        num.value = result+'.'+arr[1];
    }
}