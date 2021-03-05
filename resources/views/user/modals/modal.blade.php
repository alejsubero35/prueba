<div id="mCRUDUSER" class="modal fade bs-modal-lg" data-backdrop="static">
    <div class="modal-dialog modal-lg" id="tamañomodal">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title mCRUDTitle">{{ trans('user.create') }}</h4>
            </div>
            <div class="modal-body">
                <form action="#" id="formCRUD" role="form">
                    <div class="form-body">
                        <div class="row hide">
                            <div class="col-md-12">
                                <input type="hidden" id="id" name="id" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">{{ trans('user.first_name')}}</label>
                                    <span class="required">*</span>
                                    <input type="text" name="first_name" id="first_name" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">{{ trans('user.last_name')}}</label>
                                    <span class="required">*</span>
                                    <input type="text" name="last_name" id="last_name" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">{{ trans('user.email')}}</label>
                                    <span class="required">*</span>
                                    <input type="email" name="email" id="email" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">{{ trans('user.rol')}}</label>
                                    <span class="required">*</span>
                                    <select type="select" name="role_id" id="role_id" class="form-control" required>
                                        @foreach($roles as $rol)
                                            <option value="{{ $rol->id }}" data-slug="{{ $rol->slug }}">{{ ucfirst($rol->name) }}</option>
                                        @endforeach
                                    </select>
                                    <input type="hidden" name="rol_name" id="rol_name">
                                </div>
                            </div>
                            <!-- <div class="col-md-3">
                                <div class="form-group" if="div-password">
                                    <label for="">{{ trans('user.password')}}</label>
                                    <span class="required">*</span>
                                    <input type="password" name="password" id="password" class="form-control" required>
                                </div>
                            </div> -->
                        </div>
                        <div class="row">
                        <div id="hotel_id" class="col-md-3 ">
                                <div class="form-group">
                                    <label for="">{{ trans('user.hotel_id') }}</label>
                                    <select type="select" name="hotel_id" id="id_hotel" class="form-control">
                                        <option value="">Seleccione...</option>
                                        @foreach($hotels as $hotel)
                                            <option value="{{ $hotel->id }}">{{ $hotel->name }}</option>
                                        @endforeach
                                    </select>

                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">{{ trans('user.phone')}}</label>
                                    <span class="required">*</span>
                                    <input type="text" name="telephone" id="telephone" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">{{ trans('user.nationality')}}</label>
                                    <span class="required">*</span>
                                    <select type="select" name="nationality" id="nationality" class="form-control" required>
                                        <option value="" >Seleccione... </option>
                                        <option value="V" >Venezolana </option>
                                        <option value="E" > Extranjera </option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">{{ trans('user.identity') }}</label>
                                    <span class="required"required>*</span>
                                    <input type="number" name="identity_document" id="identity_document" class="form-control" required min="100" pattern="^[0-9]+" >
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">{{ trans('user.civil_status') }}</label>
                                    <span class="required">*</span>
                                    <select type="select" name="civil_status" id="civil_status" class="form-control" required>
                                        <option value="" >Seleccione... </option>
                                        <option value="soltero" >Soltero </option>
                                        <option value="casado" > Casado </option>
                                        <option value="viudo" > Viudo </option>
                                        <option value="divorciado" > Divorciado </option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">{{ trans('user.country') }}</label>
                                    <span class="required">*</span>
                                    <select type="select" name="country_id" id="country_id" class="form-control" required>
                                        @foreach($countries as $country)
                                            <option value="{{ $country->id }}">{{ $country->country }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">{{ trans('user.address') }}</label>
                                    <span class="required">*</span>
                                    <textarea name="home_address" id="home_address" cols="5" rows="2" class="form-control" required></textarea>
                                </div>
                            </div>
                            
                        </div>
                        
                    </div>    
                </form>
            </div><br><br>
            <div class="modal-footer">
                <div class="form-actions">
                    <div class="row">
                        <div class="col-md-offset-3 col-md-9">
                            <button type="button" class="btn btn-default" data-dismiss="modal">{{ trans('user.close') }}</button>
                            <a href="javascript:;" class="btn  button-submit save_" id="btGuardar"> {{ trans('user.save') }}
                                <i class="fa fa-check"></i>
                            </a>
                            <a href="javascript:;" class="btn  button-submit save_ hide" id="btUpdate"> {{ trans('user.update') }}
                                <i class="fa fa-check"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    #mCRUD .modal-body {
        padding: 0px !important;
    }

    #tamañomodal {
        width: 75% !important;

    }

    .form-body {
        margin-left: 15px;
        margin-right: 15px;
    }

</style>
