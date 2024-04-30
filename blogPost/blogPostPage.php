<?php
    require_once('../config.php');
    require_once BLA.'inc/nav.php';
    require_once BL.'functions/valid.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../admin/assets/css/blogPost.css">
</head>
<body>
    
    <div class='BlogPost text-center'>
          <div class='textBlogPost'>
                <h4>Recent BlogPost</h4>
                <!-- <img src="<?php echo BURL.'imag/gallery/anita.png'?>" alt=""> -->
        </div>
        <div class='container'>
            <div class='row align-items-center'>
                <div class='d-flex justify-content-center flex-wrap gap-2 mt-3'>
                    <!-- {
                        pro ?(
                            pro.map((item , index)=>{
                                return(
                                    <div key={index} className='cart col-sm-6 col-md-3 col-lg-3'>
                                    <img src={item.image} class="w-100"/>
                                    <div>
                                        <div className='d-flex justify-content-between gap-3'>
                                            <h4>{item.name}</h4>
                                            <div className='d-flex justify-content-center gap-1'>
                                                <img src={calendar} style={{width:'12px',height:'12px',marginTop:'8px'}}/>
                                                <p>{item.date}</p>
                                            </div>
                                        </div>
                                        <div className='cartText'>
                                            <h4>{item.description.slice(0,100)}...</h4>
                                            <a href='#'>read full article</a>
                                        </div>
                                    </div>
                                </div>
                                )
                            })
                        ):<h3>not found any blog post</h3>
                    } -->
                </div>
            </div>
        </div>
    </div>

</body>
</html>






<?php require_once BLA.'inc/footer.php';?>

