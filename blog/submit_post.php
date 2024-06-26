<?php
// 폼 데이터 받기
$title = $_POST['title'];
$author = $_POST['author'];
$date = $_POST['date'];
$content = $_POST['content'];

// 간단한 데이터 검증 (추가적인 검증이 필요할 수 있음)
if (empty($title) || empty($author) || empty($date) || empty($content) || !isset($_FILES['image'])) {
    echo "모든 필드를 입력해야 합니다.";
    exit;
}

// 이미지 파일 처리
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["image"]["name"]);
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

// 이미지 파일 크기 체크
if ($_FILES["image"]["size"] > 5000000) {
    echo "이미지 파일이 너무 큽니다.";
    exit;
}

// 특정 파일 형식만 허용 (jpg, jpeg, png, gif)
$allowed_types = ["jpg", "jpeg", "png", "gif"];
if (!in_array($imageFileType, $allowed_types)) {
    echo "허용된 이미지 파일 형식은 jpg, jpeg, png, gif 입니다.";
    exit;
}

// 파일 이동
if (!move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
    echo "이미지 파일 업로드에 실패했습니다.";
    exit;
}

// 새로운 포스트 데이터를 문자열로 구성
$post_data = "Title: " . htmlspecialchars($title) . "\n" .
             "Author: " . htmlspecialchars($author) . "\n" .
             "Date: " . htmlspecialchars($date) . "\n" .
             "Content: " . htmlspecialchars($content) . "\n" .
             "Image: " . htmlspecialchars($target_file) . "\n\n";

// 파일에 데이터 저장 (각 포스트를 파일에 추가)
$file = fopen("posts.txt", "a"); // "a" 모드는 파일 끝에 데이터를 추가함
if ($file) {
    fwrite($file, $post_data);
    fclose($file);
    echo "포스트가 성공적으로 저장되었습니다.";
} else {
    echo "포스트 저장 중 오류가 발생했습니다.";
}
?>
