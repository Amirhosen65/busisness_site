@extends('admin.admin_master')

@section('content')

<div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-default">

                <div class="card-header card-header-border-bottom">
                    <h2>Social Link</h2>
                </div>
                <div class="card-body">
                    <form >
                        <label class="text-dark font-weight-medium" for="">Account Type</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <select class="form-control" id="exampleFormControlSelect12" name="account">
                                    <option value="1">Facebook</option>
                                    <option value="2">X (Formerly Twitter)</option>
                                    <option value="3">Instagram</option>
                                    <option value="4">Linkedin</option>
                                    <option value="5">Youtube</option>
                                    <option value="6">WhatsApp</option>
                                </select>
                            </div>
                            <input type="text" name="url" placeholder="Url" class="form-control" aria-label="Text input with dropdown button">
                        </div>
                        <div class="form-footer pt-4 pt-5 mt-4 border-top">
                            <button type="submit" class="btn btn-primary btn-default">Save</button>
                        </div>
                    </form>
                </div>

            </div>


        </div>

    </div>
</div>

@endsection

