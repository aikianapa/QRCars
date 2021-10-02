<html>
<div class="chat-wrapper chat-wrapper-two">

    <nav class="nav navbar navbar-expand-md col p-3">
        <a class="navbar-brand tx-bold tx-spacing--2 order-1" href="javascript:">Автомобили</a>
        <button class="navbar-toggler order-2" type="button" data-toggle="collapse"
            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
            <i class="wd-20 ht-20 fa fa-ellipsis-v"></i>
        </button>

        <div class="collapse navbar-collapse order-2" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link active" href="#" data-ajax="{'target':'#carsList','filter': 'clear'}">Все
                        <span class="sr-only">(current)</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"
                        data-ajax="{'target':'#carsList','filter_remove': 'active','filter_add':{'active':'on'}}">Активные</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"
                        data-ajax="{'target':'#carsList','filter_remove': 'active','filter_add':{ 'active': '' } }">Архивные</a>
                </li>
            </ul>
            <form class="form-inline mg-t-10 mg-lg-0">
                <input class="form-control search-header" type="search" placeholder="Поиск..." aria-label="Поиск..."
                    data-ajax="{'target':'#carsList','filter_add':{'$or':[{ 'name': {'$like' : '$value'} }, { 'subject': {'$like' : '$value'} }  ]} }">

                <button class="btn btn-success" type="button"
                    data-ajax="{'url':'/cms/ajax/form/cars/edit/_new','html':'.cars-edit-modal'}">Создать</button>
            </form>
        </div>
    </nav>

    <div class="p-3">
        <div class="row">
            <div class="col-12">
                <div class="table-responsive table-striped rounded" id="carsListFiltered">
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
                        <tbody id="carsList">
                            <wb-foreach wb="table=subject&size={{_sett.page_size}}&sort=id&render=server&bind=cms.list.cars"
                                wb-filter="subject=car">
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
                                                onchange="wbapp.save($(this),{'table':'cars','id':'{{_id}}','field':'active'})">
                                            <span></span>
                                        </label>
                                    </td>
                                    <td class="text-right">
                                        <a href="javascript:"
                                            data-ajax="{'url':'/cms/ajax/form/cars/edit/{{_id}}','html':'.cars-edit-modal'}"
                                            class="pos-absolute tx-16 r-40"><i class="ri-edit-line"></i></a>
                                        <a  href="javascript:"
                                            data-ajax="{'url':'/ajax/rmitem/cars/{{_id}}','update':'cms.list.cars','html':'.cars-edit-modal'}"
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
<div class="cars-edit-modal"></div>


</html>