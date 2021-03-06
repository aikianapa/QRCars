<html>
<div class="chat-wrapper chat-wrapper-two">

    <nav class="nav navbar navbar-expand-md col p-3">
        <a class="navbar-brand tx-bold tx-spacing--2 order-1" href="javascript:">Объекты</a>
        <button class="navbar-toggler order-2" type="button" data-toggle="collapse"
            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
            <i class="wd-20 ht-20 fa fa-ellipsis-v"></i>
        </button>

        <div class="collapse navbar-collapse order-2" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link active" href="#" data-ajax="{'target':'#{{_form}}List','filter': 'clear'}">Все
                        <span class="sr-only">(current)</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"
                        data-ajax="{'target':'#{{_form}}List','filter_remove': 'active','filter_add':{'active':'on'}}">Активные</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"
                        data-ajax="{'target':'#{{_form}}List','filter_remove': 'active','filter_add':{ 'active': '' } }">Архивные</a>
                </li>
            </ul>
            <form class="form-inline mg-t-10 mg-lg-0">
                <input class="form-control search-header" type="search" placeholder="Поиск..." aria-label="Поиск..."
                    data-ajax="{'target':'#{{_form}}List','filter_add':{'$or':[{ 'name': {'$like' : '$value'} }, { 'subject': {'$like' : '$value'} }  ]} }">

                <button class="btn btn-success" type="button"
                    data-ajax="{'url':'/cms/ajax/form/{{_form}}/edit/_new','html':'.{{_form}}-edit-modal'}">Создать</button>
            </form>
        </div>
    </nav>

    <div class="p-3">
        <div class="row">
            <div class="col-sm-3">
                <form id="{{_form}}FilterForm" class="form-horizontal thead-light rounded shadow-sm p-3 tx-13" role="form" >

                    <fieldset class="form-group">
                        <label for="">Тип сущности</label>
                        <select wb-tree="item=subjects&sort=name"
                            placeholder="Тип сущности..." name="subject" class="form-control">
                            <option value="{{id}}" data-district="{{id}}">{{name}}</option>
                        </select>
                    </fieldset>

                <div class="row">
                        <button type="button" class="col btn btn-primary m-3"
                            wb-change="filter=#{{_form}}FilterForm&target=#{{_form}}List">{{_lang.get_list}}</button>
                        <button type="button" class="col btn btn-secondary m-3"
                            wb-change="filter=#{{_form}}FilterForm&target=#{{_form}}List&clear=true">{{_lang.clear}}</button>
                </div>
                </form>
            </div>
            <div class="col-sm-9">
                <div class="table-responsive table-striped rounded" id="{{_form}}ListFiltered">
                    <table class="table table-lightborder tx-13">
                        <thead class="thead-light">
                            <tr>
                                <th>Наименование</th>
                                <th>Тип</th>
                                <th>Дата</th>
                                <th class="text-right">Активность</th>
                                <th class="text-right">Действие</th>
                            </tr>
                        </thead>
                        <tbody id="{{_form}}List">
                            <wb-foreach wb="table={{_form}}&size={{_sett.page_size}}&sort=id&render=server&bind=cms.list.{{_form}}">
                                <tr>
                                    <td class="nowrap">
                                        {{name}}
                                    </td>
                                    <td wb-tree="item=subjects&branch={{subject}}&children=false">
                                            <span>{{name}}</span>
                                    </td>
                                    <td class="nowrap">
                                        {{created}}
                                    </td>
                                    <td class="text-right">
                                        <label class="switch">
                                            <input wb-module="switch" name="active"
                                                onchange="wbapp.save($(this),{'table':'{{_form}}','id':'{{_id}}','field':'active'})">
                                            <span></span>
                                        </label>
                                    </td>
                                    <td class="text-right">
                                        <a href="javascript:"
                                            data-ajax="{'url':'/cms/ajax/form/{{_form}}/edit/{{_id}}','html':'.{{_form}}-edit-modal'}"
                                            class="pos-absolute tx-16 r-40"><i class="ri-edit-line"></i></a>
                                        <a  href="javascript:"
                                            data-ajax="{'url':'/ajax/rmitem/{{_form}}/{{_id}}','update':'cms.list.{{_form}}','html':'.{{_form}}-edit-modal'}"
                                            class="pos-absolute tx-16 r-20 tx-danger"><i class="ri-close-line"></i></a>
                                    </td>
                                </tr>
                            </wb-foreach>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>



    </div>
</div>
<div class="{{_form}}-edit-modal"></div>
<wb-lang>
    [en]
    title = "Units list"
    name = "Name"
    type = "Type"
    metro = "Metro"
    visible = "Visible"
    district = "District"
    action = "action"
    square = "Square from"
    ready = "Ready"
    add = "Add item"
    section = "Section"
    finish = "Finish"
    objects = "Complex"
    building = "Building"
    get_list = "Apply"
    clear = "Clear"
    [ru]
    title = "Список квартир"
    name = "Наименование ЖК"
    type = "Тип"
    metro = "Метро"
    visible = "Отображать"
    district = "Район"
    action = "Действие"
    add = "Добавить запись"
    section = "Секция"
    finish = "С отделкой"
    square = "Площадь"
    ready = "Срок сдачи"
    objects = "Комплекс"
    building = "Корпус"
    get_list = "Применить"
    clear = "Сбросить"
</wb-lang>

</html>