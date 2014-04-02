<?php
//generate_thumb($img_path,$tiny_thumb_path,64,0,100);
###############################################################
# Thumbnail Image Class for Thumbnail Generator
###############################################################
# For updates visit http://www.zubrag.com/scripts/
############################################################### 

class Zubrag_image {

  var $save_to_file = true;
  var $image_type = -1;
  var $quality = 100;
  var $max_x = 100;
  var $max_y = 100;
  var $cut_x = 0;
  var $cut_y = 0;
 
  function SaveImage($im, $filename) {
 
    $res = null;
 
    // ImageGIF is not included into some GD2 releases, so it might not work
    // output png if gifs are not supported
    if(($this->image_type == 1)  && !function_exists('imagegif')) $this->image_type = 3;

    switch ($this->image_type) {
      case 1:
        if ($this->save_to_file) {
          $res = ImageGIF($im,$filename);
        }
        else {
          header("Content-type: image/gif");
          $res = ImageGIF($im);
        }
        break;
      case 2:
        if ($this->save_to_file) {
          $res = ImageJPEG($im,$filename,$this->quality);
        }
        else {
          header("Content-type: image/jpeg");
          $res = ImageJPEG($im, NULL, $this->quality);
        }
        break;
      case 3:
        if (PHP_VERSION >= '5.1.2') {
          // Convert to PNG quality.
          // PNG quality: 0 (best quality, bigger file) to 9 (worst quality, smaller file)
          $quality = 9 - min( round($this->quality / 10), 9 );
          if ($this->save_to_file) {
            $res = ImagePNG($im, $filename, $quality);
          }
          else {
            header("Content-type: image/png");
            $res = ImagePNG($im, NULL, $quality);
          }
        }
        else {
          if ($this->save_to_file) {
            $res = ImagePNG($im, $filename);
          }
          else {
            header("Content-type: image/png");
            $res = ImagePNG($im);
          }
        }
        break;
    }
 
    return $res;
 
  }
 
  function ImageCreateFromType($type,$filename) {
   $im = null;
   switch ($type) {
     case 1:
       $im = ImageCreateFromGif($filename);
       break;
     case 2:
       $im = ImageCreateFromJpeg($filename);
       break;
     case 3:
       $im = ImageCreateFromPNG($filename);
       break;
    }
    return $im;
  }
 
  // generate thumb from image and save it
  function GenerateThumbFile($from_name, $to_name) {
 
    // if src is URL then download file first
    $temp = false;
    if (substr($from_name,0,7) == 'http://') {
      $tmpfname = tempnam("tmp/", "TmP-");
      $temp = @fopen($tmpfname, "w");
      if ($temp) {
        @fwrite($temp, @file_get_contents($from_name)) or die("Cannot download image");
        @fclose($temp);
        $from_name = $tmpfname;
      }
      else {
        die("Cannot create temp file");
      }
    }

    // check if file exists
    if (!file_exists($from_name)) die("Source image does not exist!");
    
    // get source image size (width/height/type)
    // orig_img_type 1 = GIF, 2 = JPG, 3 = PNG
    list($orig_x, $orig_y, $orig_img_type, $img_sizes) = @GetImageSize($from_name);

    // cut image if specified by user
    if ($this->cut_x > 0) $orig_x = min($this->cut_x, $orig_x);
    if ($this->cut_y > 0) $orig_y = min($this->cut_y, $orig_y);
 
    // should we override thumb image type?
    $this->image_type = ($this->image_type != -1 ? $this->image_type : $orig_img_type);
 
    // check for allowed image types
    if ($orig_img_type < 1 or $orig_img_type > 3) die("Image type not supported");
 
    if ($orig_x > $this->max_x or $orig_y > $this->max_y) {
 
      // resize
      $per_x = $orig_x / $this->max_x;
      $per_y = $orig_y / $this->max_y;
      if ($per_y > $per_x) {
        $this->max_x = $orig_x / $per_y;
      }
      else {
        $this->max_y = $orig_y / $per_x;
      }
 
    }
    else {
      // keep original sizes, i.e. just copy
      if ($this->save_to_file) {
        @copy($from_name, $to_name);
      }
      else {
        switch ($this->image_type) {
          case 1:
              header("Content-type: image/gif");
              readfile($from_name);
            break;
          case 2:
              header("Content-type: image/jpeg");
              readfile($from_name);
            break;
          case 3:
              header("Content-type: image/png");
              readfile($from_name);
            break;
        }
      }
      return;
    }
 
    if ($this->image_type == 1) {
      // should use this function for gifs (gifs are palette images)
      $ni = imagecreate($this->max_x, $this->max_y);
    }
    else {
      // Create a new true color image
      $ni = ImageCreateTrueColor($this->max_x,$this->max_y);
    }
 
    // Fill image with white background (255,255,255)
    $white = imagecolorallocate($ni, 255, 255, 255);
    imagefilledrectangle( $ni, 0, 0, $this->max_x, $this->max_y, $white);
    // Create a new image from source file
    $im = $this->ImageCreateFromType($orig_img_type,$from_name);
    // Copy the palette from one image to another
    imagepalettecopy($ni,$im);
    // Copy and resize part of an image with resampling
    imagecopyresampled(
      $ni, $im,             // destination, source
      0, 0, 0, 0,           // dstX, dstY, srcX, srcY
      $this->max_x, $this->max_y,       // dstW, dstH
      $orig_x, $orig_y);    // srcW, srcH
 
    // save thumb file
    $this->SaveImage($ni, $to_name);

    if($temp) {
      unlink($tmpfname); // this removes the file
    }

  }

}
function generate_thumb($src, $dest, $maxx, $maxy, $imagequality) {

// Below are default values (if parameter is not passed)

// Quality for JPEG and PNG.
// 0 (worst quality, smaller file) to 100 (best quality, bigger file)
// Note: PNG quality is only supported starting PHP 5.1.2
$image_quality = 100;

// resulting image type (1 = GIF, 2 = JPG, 3 = PNG)
// enter code of the image type if you want override it
// or set it to -1 to determine automatically
$image_type = -1;

// maximum thumb side size
$max_x = 100;
$max_y = 100;

// cut image before resizing. Set to 0 to skip this.


// Folder where source images are stored (thumbnails will be generated from these images).
// MUST end with slash.

// Folder to save thumbnails, full path from the root folder, MUST end with slash.
// Only needed if you save generated thumbnails on the server.
// Sample for windows:     c:/wwwroot/thumbs/
// Sample for unix/linux:  /home/site.com/htdocs/thumbs/

///////////////////////////////////////////////////
/////////////// DO NOT EDIT BELOW
///////////////////////////////////////////////////

$to_name = '';



if (isset($imagequality)) {
  $image_quality = intval($imagequality);
}

if (isset($maxx)) {
  $max_x = intval($maxx);
}

if (isset($maxy)) {
  $max_y = intval($maxy);
}


// Allocate all necessary memory for the image.
// Special thanks to Alecos for providing the code.
ini_set('memory_limit', '-1');

$img = new Zubrag_image;

// initialize
$img->max_x        = $maxx;
$img->max_y        = $maxy;
$img->quality      = $image_quality;
$img->save_to_file = 1;
$img->image_type   = $image_type;

// generate thumbnail
$img->GenerateThumbFile($src, $dest);
}
?>