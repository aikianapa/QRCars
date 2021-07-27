<div>
    <div class="form-group row">
        <label class="col-sm-3 align-self-center form-control-label">Общий телефон</label>
        <div class="col-sm-9">
            <input class="form-control" type="phone" wb-mask="+7 (999) 999-99-99" name="phone">
        </div>
    </div>

    <!-- required bootstrap js -->
    <ul class="nav nav-tabs" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" data-toggle="tab" href="#address">Адрес</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#comps">Компетенции</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#users">Пользователи</a>
        </li>
    </ul>

    <div class="tab-content">
        <div id="address" class="container tab-pane active">
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
                        <input class="form-control" type="text" name="site" placeholder="Сайт">
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">Tелефон</label>
                        <input class="form-control" type="phone" wb-mask="+7 (999) 999-99-99" name="phone_contact"
                            placeholder="Tелефон">
                    </div>
                </div>
                <div class="col-sm-4">
                    <wb-module wb="module=filepicker&ext=png;jpg;svg;gif&mode=single" name="logo" />
                </div>
            </div>
        </div>
        <div id="comps" class="container tab-pane fade">



        <div class="divider-text">Обслуживаемые марки</div>
        <div class="form-group row">
                    <select wb-select2 name="brands" class="form-control select2 w-100" multiple
                    wb-options="{'placeholder': 'Брэнды...','dropdownParent':'#modalDealersEdit'}" >
                        <wb-foreach wb="table=subject&sort=name" wb-filter="subject=brand&active=on">
                            <option value="i{{_id}}">{{name}}</option>
                        </wb-foreach>
                    </select>
            </div>
            <div class="divider-text">Компетенции</div>
            <ul>
            <wb-foreach wb="table=subject&sort=name" wb-filter="{
                'subject':'knowledge',
                'active':'on',
                'dealer': '{{_route.id}}'
            }">
                <li>{{name}}</li>
            </wb-foreach>
            </ul>
            
        </div>
        <div id="users" class="container tab-pane fade">
        <div wb-if="'{{email}}'==''">
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
                <input class="form-control" type="email" name="login" placeholder="Логин (e-mail)" required>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-3 align-self-center form-control-label">Пароль</label>
            <div class="col-sm-9">
                <div class="input-group">
                    <input class="form-control" type="password" name="password" placeholder="Пароль">
                    <div class="input-group-append">
                        <span class="input-group-text" id="my-addon">Text</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
        </div>
    </div>
</div>