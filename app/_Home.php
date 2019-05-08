<div class="main-posts">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-default">
                    <div class="panel-body" align="center">
                        <div class="form-group col-sm-4">
                            <label>&nbsp;</label>
                            <select class="form-control" onchange="loadCities()" name="state" id="state">
                                <option>Şehir Seçiniz...</option>
                            </select>
                        </div>
                        <div class="form-group col-sm-4">
                            <label>&nbsp;</label>
                            <select class="form-control" name="city" id="city">
                                <option>Önce Şehir Seçiniz...</option>
                            </select>
                        </div>
                        <div class="form-group col-sm-4">
                            <label>&nbsp;</label>
                            <a onclick="getImsakiye()" id="btnView" class="btn btn-primary btn-block disabled">Görüntüle</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row gizle" style="margin-bottom: 100px;" id="outView">
            <div class="col-sm-12">
                <div class="panel panel-default">
                    <div class="panel-body" align="center" id="outViewPanel">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>