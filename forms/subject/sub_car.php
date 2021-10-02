<div>

    <div class="form-group row">
        <label class="col-sm-2 form-control-label">Ф.И.О. владельца</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="owner" placeholder="Ф.И.О. владельца" required>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-sm-2 form-control-label">VIN</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="vin" placeholder="VIN" required>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-sm-2 form-control-label">Госномер</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="number" placeholder="Госномер" required>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-sm-2 form-control-label">Брэнд</label>
        <div class="col-sm-10">
            <select class="form-control" name="brand" required wb-change='#subjectModelFld'>
                <wb-foreach wb="table=subject&sort=name" wb-filter="{'active':'on','subject':'brand'}">
                    <option value="{{_id}}">{{name}}</option>
                </wb-foreach>
            </select>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-sm-2 form-control-label">Модель</label>
        <div class="col-sm-10">
            <select class="form-control" name="model" required id="subjectModelFld">
                <wb-foreach wb="table=subject&sort=name" wb-render="server"
                    wb-filter="{'active':'on','subject':'model','details.brand':'%value%'}">
                    <option value="{{_id}}">{{name}}</option>
                </wb-foreach>
            </select>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-sm-2 form-control-label">Цвет</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="color" placeholder="Цвет">
        </div>
    </div>

    <div class="form-group row">
        <label class="col-sm-2 form-control-label">Дилер</label>
        <div class="col-sm-10">
            <select class="form-control" name="dealer" required>
                <wb-foreach wb="table=subject&sort=name" wb-render="server"
                    wb-filter="{'active':'on','subject':'dealer'}">
                    <option value="{{_id}}">{{name}}</option>
                </wb-foreach>
            </select>
        </div>
    </div>


    <div class="form-group row">
        <div class="col-sm-4">
            <label class="form-control-label">Дата выпуска</label>
            <input type="datepicker" wb-module="datetimepicker" class="form-control" name="date.created"
                placeholder="Дата выпуска">
        </div>
        <div class="col-sm-4">
            <label class="form-control-label">Срок гарантии</label>
            <input type="datepicker" wb-module="datetimepicker" class="form-control" name="date.warranty"
                placeholder="Срок гарантии">
        </div>
        <div class="col-sm-4">
            <label class="form-control-label">Срок страховки</label>
            <input type="datepicker" wb-module="datetimepicker" class="form-control" name="date.insure"
                placeholder="Срок страховки">
        </div>
    </div>

    <div class="form-group row">
        <label class="col-sm-2 form-control-label">Техобслуживание</label>
        <div class="col-sm-10">
            <wb-multiinput name="next">
                <div class="col-sm-6">
                    <input type="datepicker" wb-module="datetimepicker" class="form-control" name="date"
                        placeholder="Дата ТО">
                </div>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="type" placeholder="Наименование">
                </div>
            </wb-multiinput>
        </div>
    </div>
</div>