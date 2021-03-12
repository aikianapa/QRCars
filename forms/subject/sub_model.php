<div>
    <div class="form-group row">
        <label class="col-sm-2 form-control-label">Брэнд</label>
        <div class="col-sm-10">
            <select class="form-control" name="brand">
                <wb-foreach wb="table=subject&sort=name" wb-filter="{'active':'on','subject':'brand'}">
                    <option value="{{_id}}">{{name}}</option>
                </wb-foreach>
            </select>
        </div>
    </div>


    <div class="form-group row">
        <div class="col-sm-6">
            <label class="form-control-label">Основной вид</label>
            <wb-module wb="module=filepicker&mode=single" name="main" />
        </div>
        <div class="col-sm-6">
            <label class="form-control-label">Вид сбоку</label>
            <wb-module wb="module=filepicker&mode=single" name="side" />
        </div>
    </div>
</div>