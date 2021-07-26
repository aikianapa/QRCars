<html>
<div class="modal fade effect-scale show removable" id="modalDealersEdit" data-backdrop="static" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <i class="fa fa-close wd-20" data-dismiss="modal" aria-label="Close"></i>
                <div class="custom-control custom-switch">
                    <input type="checkbox" class="custom-control-input" name="active" id="dealersSwitchItemActive" onchange="$('#dealersValueItemActive').prop('checked',$(this).prop('checked'));">
                    <label class="custom-control-label" for="dealersSwitchItemActive">Активна</label>
                </div>
            </div>
            <div class="modal-body pd-20">

                <form id="dealersEditForm">
                    <input type="checkbox" class="custom-control-input" name="active" id="dealersValueItemActive">
                    <input type="hidden" name="subject" type="dealer">
                            <div class="form-group row">
                                <label class="col-sm-3 form-control-label">Наименование</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="name" placeholder="Наименование">
                                </div>
                            </div>

                            <wb-module wb="module=subform&form=subject&mode=sub_dealer" name="details" />

                </form>

            </div>
            <div class="modal-footer pd-x-20 pd-b-20 pd-t-0 bd-t-0">
                <wb-include wb="{'form':'common_formsave.php'}" />
            </div>
        </div>
    </div>
</div>
</html>
