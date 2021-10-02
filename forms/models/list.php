<html>
<div class="chat-wrapper chat-wrapper-two">

    <nav class="nav navbar navbar-expand-md col p-3">
        <a class="navbar-brand tx-bold tx-spacing--2 order-1" href="javascript:">Дилеры</a>
        <button class="navbar-toggler order-2" type="button" data-toggle="collapse"
            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
            <i class="wd-20 ht-20 fa fa-ellipsis-v"></i>
        </button>

        <div class="collapse navbar-collapse order-2" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link active" href="#" data-ajax="{'target':'#modelsList','filter': 'clear'}">Все
                        <span class="sr-only">(current)</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"
                        data-ajax="{'target':'#modelsList','filter_remove': 'active','filter_add':{'active':'on'}}">Активные</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"
                        data-ajax="{'target':'#modelsList','filter_remove': 'active','filter_add':{ 'active': '' } }">Архивные</a>
                </li>
            </ul>
            <form class="form-inline mg-t-10 mg-lg-0">
                <input class="form-control search-header" type="search" placeholder="Поиск..." aria-label="Поиск..."
                    data-ajax="{'target':'#modelsList','filter_add':{'$or':[{ 'name': {'$like' : '$value'} }, { 'subject': {'$like' : '$value'} }  ]} }">

                <button class="btn btn-success" type="button"
                    data-ajax="{'url':'/cms/ajax/form/models/edit/_new','html':'.models-edit-modal'}">Создать</button>
            </form>
        </div>
    </nav>

    <div class="p-3">
        <div class="row">
            <div class="col-sm-3">

                <ul class="list-group">

                    <wb-foreach wb="table=subject&sort=name" wb-filter="active=on&subject=brand">
                        <li value="{{id}}" class="list-group-item cursor-pointer"
                        data-ajax="{'target':'#modelsList','filter_remove': 'active,brand','filter_add':{'brand':'{{_id}}'}}" >{{name}}</li>
                    </wb-foreach>
                </ul>
            </div>
            <div class="col-sm-9">
                <div class="table-responsive table-striped rounded" id="modelsListFiltered">
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
                        <tbody id="modelsList">
                            <wb-foreach
                                wb="table=subject&size={{_sett.page_size}}&sort=id&render=server&bind=cms.list.models"
                                wb-filter="subject=model">
                                <tr>
                                    <td class="nowrap">
                                        {{name}}
                                    </td>
                                    <td>
                                        <span>{{model}}</span>
                                    </td>
                                    <td class="nowrap">
                                        {{created}}
                                    </td>
                                    <td class="text-right">
                                        <label class="switch">
                                            <input wb-module="switch" name="active"
                                                onchange="wbapp.save($(this),{'table':'models','id':'{{_id}}','field':'active'})">
                                            <span></span>
                                        </label>
                                    </td>
                                    <td class="text-right">
                                        <a href="javascript:"
                                            data-ajax="{'url':'/cms/ajax/form/models/edit/{{_id}}','html':'.models-edit-modal'}"
                                            class="pos-absolute tx-16 r-40"><i class="ri-edit-line"></i></a>
                                        <a href="javascript:"
                                            data-ajax="{'url':'/ajax/rmitem/models/{{_id}}','update':'cms.list.models','html':'.models-edit-modal'}"
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
<div class="models-edit-modal"></div>


</html>