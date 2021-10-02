<html>
<div class="modal fade effect-scale show removable" id="modalBrandsEdit" data-backdrop="static" tabindex="-1"
    role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <i class="fa fa-close wd-20" data-dismiss="modal" aria-label="Close"></i>
                <div class="custom-control custom-switch">
                    <input type="checkbox" class="custom-control-input" name="active" id="brandsSwitchItemActive"
                        onchange="$('#brandsValueItemActive').prop('checked',$(this).prop('checked'));">
                    <label class="custom-control-label" for="brandsSwitchItemActive">Активна</label>
                </div>
            </div>
            <div class="modal-body pd-20">

                <form id="brandsEditForm">
                    <input type="checkbox" class="custom-control-input" name="active" id="brandsValueItemActive">
                    <input type="hidden" name="subject" type="brand">
                    <div class="form-group row">
                        <label class="col-sm-2 form-control-label">Наименование</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="name" placeholder="Наименование">
                        </div>
                    </div>
                    <wb-module wb="module=subform&form=subject&mode=sub_brand" name="details" />
                </form>

            </div>
            <div class="modal-footer pd-x-20 pd-b-20 pd-t-0 bd-t-0">
                <wb-include wb="{'form':'common_formsave.php'}" />
            </div>
        </div>
    </div>
</div>

</html>