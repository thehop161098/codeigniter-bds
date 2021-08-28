//select loại đất
function selectGround(id)
{
    jQuery.ajax({
        url: 'Home/groundCateID',
        type: 'POST',
        data: {cateParentID: id},
        success: function(data) {
            $('#cateid').html(data);
        },
    });
}
//////
$(document).ready(function() {
    let idCate = $('#type').val();
    $("#selectCate"+idCate).trigger("click");
    //Select Quận/Huyện
    $('#city_id').change(function(event){
        var cityID = $('#city_id').val();
        jQuery.ajax({
            url: 'Home/district',
            type: 'POST',
            data: {cityID: cityID},
            success: function(data) {
                $('#district_id').html(data);
                $('#ward_id').html('<option value="">---Phường/Xã---</option>');
            },
        });
    });
    $("#city_id").trigger("change");
    //Select Phường/Xã
    $('#district_id').change(function(event){
        var districtID = $('#district_id').val();
        jQuery.ajax({
            url: 'Home/ward',
            type: 'POST',
            data: {districtID: districtID},
            success: function(data) {
                $('#ward_id').html(data);
            },
        });
    });
    $("#district_id").trigger("change");
});