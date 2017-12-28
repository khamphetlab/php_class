<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <script src="bootstrap/js/jquery.min.js" type="text/javascript"></script>
        <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        
        <style>
            body{font-family: Phetsarath OT}
        </style>
        
    </head>
    <body>
        <!-- Modal dialog -->

                <button type="button" class="glyphicon glyphicon-erase btn btn-default" id="btnDelete"> Delete</button>
            
        <!-- Modal confirm -->
        <div class="modal" id="confirmModal" style="display: none; z-index: 1050;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 style="color: red"><b><span class="glyphicon glyphicon-alert"></span> ແຈ້ງເຕືອນ!</b></h4>
                    </div>
                    <div class="modal-body" id="confirmMessage">
                    </div>
                    <div class="modal-footer">
                        <a href="#" class="btn btn-danger" id="confirmOk">ຕົກລົງ</a>
                        <a href="" class="btn btn-info" id="confirmCancel">ຍົກເລີກ</a>
                    </div>
                </div>
            </div>
        </div>
        
    </body>
    
    <script>
        var YOUR_MESSAGE_STRING_CONST = "ທ່ານຕ້ອງການລືບແທ້ ຫຼື ບໍ່?";
        $('#btnDelete').on('click', function (e) {
            confirmDialog(YOUR_MESSAGE_STRING_CONST, function () {
                //My code to delete
            });
        });

        function confirmDialog(message, onConfirm) {
            var fClose = function () {
                modal.modal("hide");
            };
            var modal = $("#confirmModal");
            modal.modal("show");
            $("#confirmMessage").empty().append(message);
            $("#confirmOk").one('click', onConfirm);
            $("#confirmOk").one('click', fClose);
            $("#confirmCancel").one("click", fClose);
        }
    </script>
    
</html>
