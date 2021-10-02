<div>
    <div class="form-group row">
        <label class="col-sm-3 form-control-label">Брэнд</label>
        <div class="col-sm-9">
            <select class="form-control" name="brand" value="{{brand}}" placeholder="Выберите производителя">
                <wb-foreach wb="table=subject&sort=name" wb-filter="{'active':'on','subject':'brand'}">
                    <option value="{{_id}}">{{name}}</option>
                </wb-foreach>
            </select>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-sm-4">
            <label class="form-control-label">Мощность</label>
            <div class="input-group mg-b-10">
                <input class="form-control" type="number" name="power">
                <div class="input-group-append">
                    <span class="input-group-text" id="basic-addon2">л/с</span>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <label class="form-control-label">Комплектация</label>
            <input class="form-control" type="text" name="complect">
        </div>
        <div class="col-sm-4">
            <label class="form-control-label">Годы выпуска</label>
            <input class="form-control" type="text" wb-mask="9999-9999" name="years">
        </div>
    </div>


    <div class="form-group row">
        <div class="col-sm-6">
            <label class="form-control-label">Изображения</label>
            <wb-module wb="module=filepicker&mode=multiple&view=contain" name="images" />
        </div>
    </div>
</div>