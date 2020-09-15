<style>
.gallery_img {
    position: absolute;
    height: 95%;
    width: 95%;
    cursor:pointer;
    margin: 1%;
    border:1px solid #000;
}

.cb {
    position: absolute;
    margin: 2.5%;
    height: 25px;
    width: 25px;
}

.delete-gallery-img{
    background: #fff;
    z-index: 100000;
    cursor:pointer;
    position: absolute;
    right: 0;
    padding: 1px 7px;
    top: 7px;
}
</style>
<input type="hidden" id="select_gallery_images" name="gallery" >
<button type="button" class="btn btn-primary float-warning" data-toggle="modal" data-target="#modal-large">Add Gallery</button>
<div class="modal fade" id="modal-large" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title pull-left">Gallery</h5>
            </div>
            <div class="modal-body" style="max-height: 500px;overflow: auto;background: #f5f5f5">


                    <input type="file" id='gallery_image' name="gallery_image[]" multiple>
                <div class="row" id="gallery">

                </div>
                <div class="text-center"><button type="button" class="gallery_load_more btn btn-primary btn--icon-text">Load More</button></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-link save_gallery" data-dismiss="modal">Save changes</button>
                <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<script>
    let galleryPage = 0;

$(document).ready(function() {
    selectGallery(0);

    $(document).on('click', '.gallery_img', function() {
        $(this).closest('div').find('.cb').click();
    });
    $(document).on('click', '.gallery_load_more', function() {
        selectGallery(0);
    });

    $(document).on('click', '.save_gallery', function() {
        let x = '';
        $('input:checkbox.cb').each(function () {
            let a = (this.checked ? $(this).attr('data-id') : "");
            if(a){
                x += a+',';
            }
        });
        $("#select_gallery_images").val(x);
    });



    $('#gallery_image').change(function() {
        var form_data = new FormData();
        var allfiles = document.getElementById('gallery_image').files.length;
        for (var i = 0; i < allfiles; i++) {
            form_data.append("gallery_image[]", document.getElementById('gallery_image').files[i]);
            form_data.append("_token", '{{csrf_token()}}');

        }
        $.ajax({
            url: '{{ route("admin.gallery.store") }}',
            type: 'post',
            data: form_data,
            dataType: 'json',
            contentType: false,
            processData: false,
            success: function(success) {
                var src = success;
                console.log('Your Multiple File is Upload.');
            },
            complete:function(){

                selectGallery(allfiles);
            }
        });
    });

    $(document).on('click','.delete-gallery-img',function(){
        let _this = $(this);
            $.ajax({
                url:"{{url('/')}}/admin/gallery/"+$(this).attr('data-id'),
                type:"POST",
                data:{
                    _method:'DELETE',
                    _token: '{{csrf_token()}}'
                },
                complete:function(){
                    _this.closest('.col-md-3').remove();
                }
            });
        });
});


function selectGallery(count) {
    $.ajax({
        url: '{{ route("admin.gallery.index") }}',
        type: 'GET',
        data: {
            'count':count,
            'id':$("#gallery .col-md-3:last").attr('data-id')
        },
        beforeSend:function(){

        },
        complete: function(res) {
            let json = JSON.parse(res.responseText);
            if(count){
                $.each(json, function(i, v) {
                    $("#gallery .col-md-3:first").before(
                        '<div data-id="'+v['id']+'" class="col-md-3" style="position:relative;height:150px">' +
                        '<img class="gallery_img" src="' + base_url + v['path'] + '">' +
                        '<a class="delete-gallery-img" data-id="'+v['id']+'"><i class="fa fa-trash"></i></a>'+
                        '<input type="checkbox" class="cb" id="cb'+v['id']+'" data-id="'+v['id']+'"></div>')
                });
            }else{
                $.each(json, function(i, v) {
                    if(!$("#gallery .col-md-3[data-id='"+v['id']+"']").length){
                    $("#gallery").append(
                        '<div data-id="'+v['id']+'" class="col-md-3" style="position:relative;height:150px">' +
                        '<img class="gallery_img" src="' + base_url + v['path'] + '">' +
                        '<a class="delete-gallery-img" data-id="'+v['id']+'"><i class="fa fa-trash"></i></a>'+
                        '<input type="checkbox" class="cb" id="cb'+v['id']+'" data-id="'+v['id']+'"></div>');
                    }

                });
            }
        }
    });
}

@if(isset($data))
setTimeout(function(){
    let ax = "{{ $data->thumbnail }}";
    let ex = ax.split(',');
    ex.forEach(element => {
        if(element!="," && element!=""){
            $(".col-md-3[data-id='"+element+"']").find('input').prop('checked',true);
            console.log($(".col-md-3[data-id='"+element+"']").find('input'));
            console.log(element);
        }
    });
},2000);
@endif

</script>
