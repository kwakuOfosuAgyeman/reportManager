$(document).ready(function () {
    //alert('Hello');
    //console.log($(".add_discipline_btn").click());
    $('#add-Discipline').click(function() {
        alert('click');
    });
    $(".add_discipline_btn").click(function() {
        alert('clicked');
        //e.preventDefault();
        $("#show_discipline").prepend(`
        <div class="row">
            <div class="col-sm-6 col-md-5">
                <div class="form-group">
                    <label class="form-label">Discipline</label>
                    <input type="text" name="discipline[]" class="form-control" placeholder="Sport" value="">
                </div>
            </div>
            <div class="col-sm-6 col-md-5">
                <div class="form-group">
                    <label class="form-label">Position</label>
                    <input type="text" name="position[]" class="form-control" placeholder="Position" value="">
                </div>
            </div>
            <div class = "col-md-2 mb-3 d-grid">
                <button class= "btn btn-danger remove_discipline_btn">Remove</button>
            </div>
        </div>
        `);
    });
});
