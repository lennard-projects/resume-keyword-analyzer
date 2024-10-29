<?php
    $output = "";
    $count_keyword1 = 0;
    $count_keyword2 = 0;
    $count_keyword3 = 0;
    if(isset($_POST['submit'])) {
        if(!empty($_FILES["pdf_files"]["name"])) {
          foreach ($_FILES['pdf_files']['tmp_name'] as $key => $value) {
            $fileName = $_FILES['pdf_files']['name'][$key];
            $fileType = pathinfo($fileName, PATHINFO_EXTENSION);
            $allowTypes = array("pdf");
            $count1 = 0;
            $count2 = 0;
            $count3 = 0;
            $count4 = 0;
            $count5 = 0;
            if(in_array($fileType, $allowTypes)) {
              include 'vendor/autoload.php';
              $parser = new \Smalot\PdfParser\Parser();
              $pdf = $parser->parseFile($_FILES['pdf_files']['tmp_name'][$key]);
              $text = $pdf->getText();
              $lowercase = strtolower($text);
              $explode = explode(".",$lowercase);
              $implode = implode(" ", $explode);
              $chunks = preg_split('/(:|-|\*|=|•|,|\s)/', $implode);
              $implode2 = implode(" ", $chunks);
              $explode2 = explode(" ",$implode2);
              $count = count($explode2);
              for ($i=0; $i < $count ; $i++) { 
                  if ($i == ($count - 1)) break;
                  if($explode2[$i] == "graphic" && $explode2[$i + 1] == "design") {
                    $count_keyword1 += 1;
                  }
                  if($explode2[$i] == "market" && $explode2[$i + 1] == "share") {
                    $count_keyword2 += 1;
                  }
                  if($explode2[$i] == "market" && $explode2[$i + 1] == "research") {
                    $count_keyword3 += 1;
                  }
                }
              foreach ($explode2 as $value) {
                if($value == "manage" || $value == "manages" || $value == "managing" || $value == "managed" || $value == "manager") {
                  $count1 += 1;
                }
                if($value == "design" || $value == "visual") {
                  $count2 += 1;
                }
                if($value == "mentor" || $value == "mentored" || $value == "mentors" || $value == "mentoring") {
                  $count3 += 1;
                }
                if($value == "supervisor" || $value == "supervised" || $value == "supervising" || $value == "supervises") {
                  $count4 += 1;
                }
                if($value == "marketing") {
                  $count5 += 1;
                }
              }
            }
            $output .= '<div class="card my-4 p-4 " style="width: 40rem;">
                          <div class="card-body">
                            <h5 class="card-title">Filename:<span class="mx-2 fw-bold">'. $_FILES['pdf_files']['name'][$key] .'</span></h5>
                            <h5 class="card-title">Keywords:</h5>
                            <p class="card-text">1. Manage/manages/managing/managed/manager:<span class="mx-1 fw-semibold">'. $count1 .'</span></p>
                            <p class="card-text">2. Graphic design/design/visual:<span class="mx-1 fw-semibold">'. $count2 + $count_keyword1 .'</span></p>
                            <p class="card-text">3. Mentor/mentored/mentors/mentoring:<span class="mx-1 fw-semibold">'. $count3 .'</span></p>
                            <p class="card-text">4. Supervisor/supervised/supervising/supervises:<span class="mx-1 fw-semibold">'. $count4 .'</span></p>
                            <p class="card-text">5. Market share/marketing/market research:<span class="mx-1 fw-semibold">'. $count5 + $count_keyword2 + $count_keyword3 .'</span></p>
                          </div>
                        </div>';
        }
        echo $output;
        }
    }
?>