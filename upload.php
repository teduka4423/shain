
<html lang="ja">
	<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>アップロードページ</title>
    <link rel="stylesheet" href="css/style.css?20220514">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
		<script>
		$(function(){
			// ドラッグしたままエリアに乗った＆外れたとき
			$(document).on('dragover', '#file_drag_drop_area, #file_drag_drop_area_stl', function (event) {
					event.preventDefault();
					$(this).css("background-color", "#999999");
			});
			$(document).on('dragleave', '#file_drag_drop_area, #file_drag_drop_area_stl', function (event) {
					event.preventDefault();
					$(this).css("background-color", "transparent");
			});

			// ドラッグした時
			$(document).on('drop', '#file_drag_drop_area', function (event) {
					let org_e = event;
					if (event.originalEvent) {
							org_e = event.originalEvent;
					}

					org_e.preventDefault();
					file_input.files = org_e.dataTransfer.files;
					$(this).css("background-color", "transparent");
			});
		});
		</script>
	</head>
	<body>
    アップロード 
    <br>
    場所：<?php echo $_POST['dirpath']; ?>
    <br>
		<form id="file_upload_form" method="post" enctype="multipart/form-data" onsubmit="return checkForm();">
            <?php print("<input type=\"hidden\" name=\"dirpath\" value=\"" . $_POST['dirpath'] .  "\">"); ?><br>
            <div id="file_drag_drop_area" class="text-center p-3 rounded col-md-10 mx-auto" style="border:3px #000000 dashed;">
				ここにファイルをドラッグ&ドロップ<br/>
				<span>または</span><br/>
                <input id="file_input" type="file" name="upload_file[]" multiple="multiple">
			</div>
            <br>
            <br>
            <div class="text-center">
                <input type="submit" name="_upload" value="アップロード">
            </div>
		</form>
<?php
//[アップロード]ボタンの押下確認
if (isset($_POST['_upload'])) {

    for ($i = 0; $i < count($_FILES['upload_file']['name']); $i++) {
	//ファイルをテンポラリから保存場所へ移動
	    $filename = $_POST['dirpath'] ."/".  $_FILES['upload_file']['name'][$i];
        $tmp_name = $_FILES['upload_file']['tmp_name'][$i];
	    if (move_uploaded_file($_FILES['upload_file']['tmp_name'][$i], $filename)) {
		    echo $_FILES['upload_file']['name'][$i] . 'をアップロードしました<br>';
	    } else {
		    echo '【Err】' . $_FILES['upload_file']['name'][$i] . 'をアップロード出来ません！<br>';
	    }
    }
}
?>
<script>
function checkForm()
{
	if (document.getElementsByName('file')[0].value == '') {
		alert('ファイルを選択してください');
		return false;
	}
}
</script>

    </body>
</html>