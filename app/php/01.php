'<div class="form-row" id="campo' + cont + '">
    <div class="form-group col-md-2"><input type="text" class="form-control form-control-sm" name="sap[]" value="' + sap + '" readonly></div>
    <div class="form-group col-md-4"><input type="text" class="form-control form-control-sm" name="produto[]" value="' + produto + '" readonly></div>
    <div class="form-group col-md-2"><a class="btn btn a btn-sm" id="subtrair" onclick="subtrair( )" style="color:#fff ;background-color:#FF5E14;">-</a>
        <input type="text" class="form-control form-control-sm" name="quantidade[]" value="' + quantidade + '"><a class="btn btn btn-sm" id="somar" onclick="somar( )" style="color:#fff ;background-color:#FF5E14;">+</a>
    </div>
    <div class="form-group col-md-2"><a class="btn btn-danger btn-sm" id="' + cont + '" style="color: #fff;"> Excluir </a></div>
</div>