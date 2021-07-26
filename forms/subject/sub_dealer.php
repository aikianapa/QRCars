<div>
    <div class="form-group row">
        <label class="col-sm-3 align-self-center form-control-label">Общий телефон</label>
        <div class="col-sm-9">
            <input class="form-control" type="phone" wb-mask="+7 (999) 999-99-99" name="phone">
        </div>
    </div>

    <div class="divider-text">Адрес</div>

            <div class="form-group row">
                <label class="col-sm-3 align-self-center form-control-label">Адрес фактический</label>
                <div class="col-sm-9">
                    <input class="form-control" type="text" name="address" placeholder="Адрес фактический">
                </div>
            </div>
            <div class="row">
        <div class="col-sm-8">
            <div class="form-group">
                <label class="form-control-label">Сайт</label>
                <input class="form-control" type="text" name="site" placeholder="Tелефон">
            </div>
            <div class="form-group">
                <label class="form-control-label">Tелефон</label>
                <input class="form-control" type="phone" wb-mask="+7 (999) 999-99-99" name="phone_contact" placeholder="Tелефон">
            </div>
        </div>
        <div class="col-sm-4">
            <wb-module wb="module=filepicker&ext=png;jpg;svg;gif&mode=single" name="logo" />
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-3 align-self-center form-control-label">Обслуживаемые марки</label>
        <div class="col-sm-9">
            <select wb-select2 wb-options="{
                'placeholder': 'Брэнды...',
                'dropdownParent':'#modalDealersEdit'
            }" name="brands" class="form-control select2" multiple>
                <wb-foreach wb="table=subject&sort=name" wb-filter="subject=brand&active=on">
                <option value="i{{_id}}">{{name}}</option>
                </wb-foreach>
            </select>
        </div>
    </div>

    <div class="divider-text">Управляющий</div>
    <div class="form-group row">
        <label class="col-sm-3 align-self-center form-control-label">Имя / Фамилия</label>
        <div class="col-sm-4">
            <input class="form-control" type="text" name="chief_name" placeholder="Имя">
        </div>
        <div class="col-sm-5">
            <input class="form-control" type="text" name="chief_family" placeholder="Фамилия">
        </div>

    </div>
    <div class="form-group row">
        <label class="col-sm-3 align-self-center form-control-label">Логин (e-mail)</label>
        <div class="col-sm-9">
            <input class="form-control" type="email" name="login" placeholder="Логин (e-mail)">
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-3 align-self-center form-control-label">Пароль</label>
        <div class="col-sm-9">
            <input class="form-control" type="password" name="password" placeholder="Пароль">
        </div>
    </div>
    <div class="divider-text">Компетенции</div>
    <input class="form-control" wb-module="tagsinput" type="text" name="knowledge" placeholder="Компетенции">
</div>