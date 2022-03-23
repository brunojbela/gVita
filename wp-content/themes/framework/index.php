<?php get_header(); ?>

<main id="content" class="home">
    <?php
    $banner = get_field('banner_imagem_desktop');
    if (wp_is_mobile() && get_field('banner_imagem_mobile')) {
        $banner = get_field('banner_imagem_mobile');
    }
    ?>
    <section id="banner" style="background-image: linear-gradient(90deg, var(--dColor), transparent), url('<?php echo $banner; ?>'); --colorBanner: <?php echo get_field('cor_texto_banner'); ?>;">
        <div class="container">
            <div class="row py-5">
                <div class="col-12 col-md-6 p-md-0">
                    <h1 class="mb-4">
                        <?php echo get_field('banner_titulo'); ?>
                    </h1>
                    <div class="content">
                        <?php echo get_field('banner_conteudo'); ?>
                    </div>
                </div>
                <div class="col-12 col-md-6 p-md-0">
                    <h2 class="text-center mb-4" style="color: <?php echo get_field('cor_titulo_formulario') ?>">
                        <?php echo get_field('banner_titulo_formulario'); ?>
                    </h2>
                    <div class="formContato d-flex">
                        <?php echo do_shortcode('[contact-form-7 id="5" title="Formulário Principal" html_class="d-flex flex-wrap"]'); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="slogan py-4" style="--backgroundSlogan: <?php echo get_field('background_slogan'); ?>; --color-slogan:<?php echo get_field('cor_slogan'); ?>;">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12 col-md-3 text-center">
                    <img src="<?php echo get_field('sobre_logo')['url']; ?>" alt="<?php echo get_field('sobre_logo')['alt']; ?>">
                </div>
                <div class="col-12 col-md-9">
                    <h2 class="text-center mb-0">
                        <?php echo get_field('sobre_slogan'); ?>
                    </h2>
                </div>
            </div>
        </div>
    </section>
    <section id="diferenciais">
        <div class="container">
            <?php
            if (have_rows('linha')) {
                while (have_rows('linha')) {
                    the_row();
            ?>
                    <div class="row">
                        <?php
                        if (get_sub_field('coluna')) {
                            $count = count(get_sub_field('coluna'));
                            $i = 1;
                            while (have_rows('coluna')) {
                                the_row();
                                $class = $count == 2 ? "col-md-6" : '';
                                $bgImage = 'url('.get_sub_field('background_Image').')';
                                $style = "";
                                if(!get_sub_field('titulo') && !get_sub_field('conteudo')){
                                    $bgImage = "linear-gradient(-90deg, ". get_sub_field('background_cor')."65, transparent), url('". get_sub_field('background_Image') ."')";
                                    $style = "background-blend-mode: multiply; background-color: transparent; background-size: 35% 100%, cover; background-position: right center; text-align: right; --content: ". get_sub_field('legenda');
                                    if($i == 2){
                                        $bgImage = "linear-gradient(90deg, ". get_sub_field('background_cor')."65, transparent), url('". get_sub_field('background_Image') ."')";
                                        $style = "background-blend-mode: multiply; background-color: transparent; background-size: 35% 100%, cover; background-position: left center; --content: '". get_sub_field('legenda')."';";
                                    }
                                }
                        ?>
                                <div class="diferencial col-12 <?php echo $class; ?> p-md-5 p-4 justify-content-center d-flex align-items-center" style="<?php echo $style; ?> --bg-image: <?php echo $bgImage; ?>; --text-color: <?php echo get_sub_field('cor_texto'); ?>; --bg-color: <?php echo get_sub_field('background_cor'); ?>;  ">
                                    <div>
                                        <?php
                                        if (get_sub_field('titulo')) {
                                            echo "<h2 class='mb-3 text-center'>" . get_sub_field('titulo') . "</h2>";
                                        }
                                        if (get_sub_field('conteudo')) {
                                        ?>
                                            <div class="content text-center">
                                                <?php echo get_sub_field('conteudo'); ?>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                        <?php
                        $i++;
                            }
                        }
                        ?>
                    </div>
            <?php
                }
            }
            ?>
        </div>
    </section>
    <?php
    if (get_field('link_tour')) {
    ?>
        <section id="tour" style="--bg-image: url(<?php echo get_field('background_image_tour')['url']; ?>); --bg-color: <?php echo get_field('cor_bg_tour'); ?>; --bColor: <?php echo get_field('cor_borda'); ?>;">
            <div class="container">
                <div class="row text-center justify-content-center py-5">
                    <div>
                        <div class="content mb-3">
                            <?php echo get_field('conteudo_tour'); ?>
                        </div>
                        <button class="mb-4" data-toggle="modal" data-target="#mytour" style="color: <?php echo get_field('buttom-color'); ?>; background: <?php echo get_field('buttom-bg'); ?>;">Faça um tour Virtual</button>
                        <figure>
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="128" height="78" viewBox="0 0 128 78">
                                <defs>
                                    <pattern id="pattern" preserveAspectRatio="none" width="100%" height="100%" viewBox="0 0 600 367">
                                        <image width="600" height="367" xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAlgAAAFvCAYAAACW8bVUAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAK8FJREFUeNrs3b12G8l67vHS9gTOBvsKBsycCcomU/MKRGZ2RDA7GYnsZCSvgOAVEIy8HBGKzjoRm9lkgjI7Uis80YYyZz71Am+LPRI5xEd9ddX/txYWtfe28VHVVfV0dXW1MQAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAwJc3FAEAAOk6Pz8f2j/D9j9Pp9OaUiFgAQCA10PUwP6p7GtkX+/ta6D/fo2Erca+Psu/bfhaUJoELAAASg5VQ/vnyL5ONgxTm1hq6Ppow9aMUiZgAQBQSrAaa6iqPH+UhK25fV3ZsNVQ8gQsAAByDVYXprOeKqDaviZcQiRgAQCQS7Cq7J/bSMHqRzMNWktqhoAFAEAfg9VAg9VRYl9NwpVcNpxSSwQsAAD6FK4q++ferO8GTFVtX8fMZvnxN4oAAACn4erS/nlIPFwJCYGf7PcdUWvu/RNFAACAs3AllwTPe/SVJQT+6++///7//vjjDxbAO8QlQgAA9g9Wqa632sYpe2e5wyVCAAD2d9/zcCVudSsJELAAAIhLLwtWmfwcCVlH1CoBCwCAmOHq0v4ZZ/azbln4vj/WYAEAsFu4kpme+0x/XmNf79jCYXfMYAEAsH24Gpr1ovZc5f77CFgAACRIwscg8994xHqs3XGJEACALeiddqXM7sglwgMuFW7vF4oAAICNw5XMWl0E+rjavmTzz2/6byGfLwvQfzPrOxeHnr+DfJ5snHpJ7W+HGSwAADYPWJeeA5YEqTv7mm8ya6Rrwcb2dWb8XrKUWayGI4CABQCA63AlAeaLpyAjwerKhph6z/DnK2jN7Hc75SggYAEA4DpgyaWyaw9vPbHhZeowBMrWEZWH7/l31mJtjrsIAQDYzJnj95Ow8s5VuBISgOzrUP7p4fePOQQIWAAAOHN+fl4ZtwvKJVwd2jC08PF97ftO7B/Xl/TOOBIIWAAAuHTSl3DVCVkz+2fm8C2HPEKHgAUAgEuVw/e68h2uOiFLZrFcftYJhwIBCwCAvemszdDR29Uu11xt6DjRoEnAAgCgYC5DRfCtDnT/qitHbzfSOxVBwAIAYC/vHb3PLOJmnS5nzViHRcACAGBvQ0fvcxfrB+j+VTNHb1dxSBCwAADYl4sZm2afXdod+ejofX7jkCBgAQCwM33Wnwuxw5XMYs0dvdWQI4OABQBACmHicyK/p6ZKCVgAAORikcj3cPEswYrqJGABAIAnnymCMH6hCNAHug5i+BdnT7+ap4Woyxc6kYX+b8tQuyjj+zPcjKO6MwksFC6t3gbm+UXeb/V/a+vn2w//+9I8zdo0EbcnAAhYgO6YPNLOu909ebjDWx298jndAaDRQX3B4L1zvbWDsAzKv2mdVTu+3SZ1J2qtu6/674Xeio7d6q0NTLvUW7XBZxmtL3k96t8FJzsgYAH+ApUMqO9N+Ov6Pw0mOggsdMB+dHjXTW711gaott6GEb5Gt+4u9HsttP7kdvSawPVsoDqKWG/DH8O3trlaQ9ecwOXdW4qAgIV8O3npXE+0o0/xkQvtLNq5dv5zHbDnJQ/YGoZPdHBMdSfntu7G+p2LrzsNw0dad6nWW6WvC/t9l22by+wEZ2TSuIPPRZ9bG7zqDUWAgJ38WDv5YU9/Rtvx35Rylt2Z8Tgz/X88xsy+7kq5DGzrbtwJxH3VdNpcE7Hv+uLi+LO/4TSB4+J/XAQs+1sOGdkIWIgfrC7aGYWMyCB9letgrcHqXINVbg92XeiAPcu43vp8IpNcQHYUSmSh/0Hk40NOlu5zCYsELJQarKSjv84wWGUdtDIPVj8NePZ1mlHdXRZSbzKjNQk5o2XL9pNxM4N7GPN4s7/j1lGfLH3eJSMdAQvhG7EM0BcFdPQ/nl1P+rzOR89ubwurtygDtuN6q7TehoXV21QH+mWAMpZZnyMX/USsmR89efqHo7c75I7r17HRKFw24KF9PZj1zFVpg7ScFX7RkNK3ehvoAHJfYL0ZHTg/6ZqlvtWbBKsHU+az4c613qoAn/Xoqp9w+GzDXcrLFe70JGAhYGe/GqRM2Y9QkHByb8viukf1Jpc9vjg6O+973d1KYNEz/T7U2yeT/yX410hYedDLoz7VDt/rNsbJr9GtTFyEK7Y/IWAhXOOVM6NSZz9eKpKH1AdqnbH5RL39eYZBB+xB4vVW6qzVSy58tjm9a7hx9HbVeWe33EDuHb5XzeFGwEKYzl7Oxq4piZ870ZQHah2kb6mmZ4207kYJ1xuhOHybcxksrkMdX9pHu/ysOw41AhbCNNwxJfHqQD1IrN4IV5vX3ZB6o815ChbeQ7zOlLnsoxt22idgwX9nf0m42rzDZ5DupXZN3YB6I2TpXXON4+PLW8jydHXhhsOLgAX/nf0FJbF5h6+dXex6GzFI7zRY30eutyPqLZl6cx0wJGR9crlIv3M3t48T4BmH1ub+iSLADoP0v9vXP1Ma23X4v//++9c//vhjEaneVmfLhrU7uxjauntj666O1N7uaW8719vA1tv/dfWG9v3+0/75Xx7qo7LvfWRf/2W/b7NrG7f///9bw/i/+AhX0+n0PzisNscMFrbFAtvdXUdc01PiRpQuXQTab4n25jyjuqs33Z7A12Wy9tKmvMabXuLUGSu5FCjbrfjc4PmKw2k7v1AE2KKnujT9f+BvTAMdMA8D15tcYjqi+J2EnQPaW//qzZblO4d7N8kO8j6f9VjpS753bdaben7Tv0v9XHn9pv93IU6crvr6pIOYuESITTt7CQdcGtzfMPSlQvt5/8cwC+IkIIe6VKgznfcUubMTm392danQvs9/Sxu2//zXEP2FNGENUvJ5Yz1ZqjR8h2jXEur+TX43h9J2uESITZX4+Btfgt0goDckDClyZ84C3VXI3nLOm4K7y/PT6VSeX1kXUnan7NxOwILfs+kxJeHurDTgc++429MtCVfnntubzExwSTf9tnBs1rM7OZtrmAQBC77O2imC/gUfZq/8tQfPs1i0Nz/GjmexJFydZlxei8x/n3cscsdGHVNC36WRsyr7+mzWuwrXL4QLGQBH+nqrMwIpXeKUWazqpe+f8UAtg5L85kftwJuXFs/qTI7UWdWpwxQM9LvMPITioUlvtnibOqs01Lf1lVrAlzYxcRiy5vY3X5n8ZopX4ZFLg/t5QxHglQ5fOvsUNjmUwexmn8c06G850QE7BbKvzKmnepNw8imhQ6nW+pvv8ZvaYHORwMC9sL/lnYd6u0xosJY6u7O/c7bncXiWUGhc2t/zdw/1lttjw465NEjAgv+AdR955mChjb1x+JvOjd/9YqJ29vobZZH0eQKHUHsmPHf8+1IIIgeub123v+tLAuFR6kxuy586/F1DPVFL4eTGS3jIKGSd7hOq8YQ1WHhNzHAlMzzvXA9iOnAcmvgLVAe6R5UPKQxkEo7f+RjM7HteJlCHTutOZ3tSCFeHLsOV1pdcVpT6SmHg/uDjTXU2uu/BhHBFwEIIkXau7oYrbwss9VLjcQLF/N5DvckgHXuDykYH6sZjHdaR69B13cUOxW24WnissxRCyFHmv2/Xuj8mXBGwEE6sDl8G5YnvD9EB+irDMq4SOHaCLJCNXIeuy/lDAnUWYgNcaduLiL9zoLOFPkPWxPRHezLEmisCFnp8hp7U4Nz2hybuZSYfHf3byMfNzPPdkT8OaJc6SPR9oI4561iHGmC1bccOIJXn35jKMoTXSJ2/CxSsCVhA5A5/EXhw9vnw1o14uBQb+/LgVSGf6aysO1tSFFFn2sZjDupvA/3GAw0xqVmFXPsdj9mKgYCF8IP+IFKHfxfhM2eZBdkq4m+ZR3oobKxBbJjY++yiCXlSE7mtBy1vCS8SYsx6NqsxaZD+7sD1jQwgYCHeoJ/sQKmBIOqaEIfBeBj5uPkY40P1LDxGSHjb8/YWM5zGnNmpAh+fcglWZrNOIwatNlixgSgBC5HFGKiXkWY/jIn74Na3Pa+3VAbNxx6H418LK7f2xKaogV7u0tOgdRyoz1n+EKwag2B4VA5SGqhjziJ9jvjZg57X2/f6i3xmHOP4GSX2PrsOwjHrrIrxwQEeVfVXQUtOROY64yzbRnxwWA5LPdH5yJ2BBCwghY4+lzO7YcFlGOP4GfT9gIkVMjJrd7uWvfx+WQs17Tw/VYLWW23Low2O+YWWo5wk1twRSMACnhNzFilmp1RRfyjUV4rge9hq1xE+G3g7dxs3XOojYKHf3pb0Y6VzWz+iECBkI8k+qqYU+oVF7njJgCLopZiLpRkAAICABWRpRBEAAAELAACAgAUAAAACFgAAQFDcRQggC3qX1RtKAkAKmMECAAAgYAHZ4cGrAEDAAuAYj7YAgMywBgsvmZjwm402FDsAgICFbPHA0KC4RAgAmeESIRAfD0kGAAIWAMcaigAACFhAds7Pz2M+w4+ABQAELCBLw1gfrBtkAgAIWEB23kf6XMIVABCwgGxVkT73kaIHgPywTQOKd35+PrR/Yq3BmlMDL9bJsBN8t5lhbENrbV9LthwBQMAC4riI9LkNg//3QDXSMPVe/+6zyW3VrVf73m3YkuBVs+YNAAELCDOwjyN9/E3hZT+0f47s68z4v8mg0teF/VzZ2FVmDu8IWwAIWID7AV5mSW4jfbwM8rOCg9VFxGA70M8e2+/S2L9XNmjNaBEACFiAm3D1YOKtvbqxg/qywDK/jhisniNh79Z+twuCFgCXuIsQJYarYeRwJcFqWliZy6XAL4mFq+eC1oMeHwBAwAI2HOQH9nVp//kpYrgSVyXNXtkyl1mre7PfwvVQKjk+7Hce02IA7INLhChhgJcwdWLWsyexB3m5i21aSLkPNFhVPfvqq7V59vu/tVU1oQUBIGAhl0F539mlkQ6S7zv/ToHMWh0XVI8xL8M6+hnnAxuyTmmZAAhY6LuRDsy5kXB1WNClwfueh6uW3GloCFkAtsUaLCCMSSmbitpAIltfVBn9pLGu3QMAAhaQiNVlwVJu/9fF4eMMf5psUFpxOAMgYAFphCu5LFjK8waHZr3PVa7udW0ZABCwgEhq+zoo7FmDEq5yDiCDzAMkAAIWkCyZtZL1Voel7dSeebhqjblUCICABYQl+1sdlLLPVcEuKAIABCzAr/ahzRKsJgXOWpWoYhYLwGvYBwvYjaytupNwRagqkjwZoKYYABCwADcas952YUFRFE3WYjFjCeBFXCIEtjO0rwfZTFOfcYiCQxZFAICABbgz0MH1kw1ZD6zHKdYHigAAAQvwQ8LVA0FrZ/ULr17UPRuPAngJa7AAd0FLBtyZWe+DxdqcnzVmfWOABKjFa2Wk4UUuw8pM0ZFZX55Nsd7nVC0AAhbg11jCgA0HshC+pjhWpByuti0PDWC1viY6Q3hh0nqQ9IiABeA5XCIE3JOZF7lkeFl4ObQPuj50ETblPeS95D31vVPwnsMdAAELCOtC7jYsOFx5edC1vudhIiGLO0kBELCACMYFhqw2XHnbK0zfO4WQNWChOwACFkDICuEqxEas+hlXCfxeZrEAELCAiCHrsoDf2YR82LV+VhP5NzODBYCABUR0UcBeWVeFfGYXM1gAfsI2DUhNs8eA+b4z4KU6q3BvQ9ZBxvtkzSN95i1NBwABC3iBDR4SsC73fR8bYobmz5tUphK45HvIXk6TDKtvESM4ymfa+l4YZpIAELCAIEFNXjK7cWoH4LEGm2ECX89+nfMb/Y45qSN/NgELQDJYg4VSAtfMvg7MeuYohctzFxkW87dCPxsACFgoPmjJXWeyf1IT+auM9TJmTupCPxsACFiA7p/0zsSfyTqjNgCAgAXkFLJWu41H/hpH1AQA5IlF7ig5ZC3Oz89lS4hY66GGsi+WiwchAwjPtt8Hs75xRtrwR/mb8RYsIGAB2+Uss75UF2sbhw+G9UNAn0nAGuvL6JYhq8DFyRMBCyg3Xa33UJpJvxjpK1TUApCVkb5kO5al+fPsVkPxELCAktxEDFjs3QTkS2bGj/TF7FZhWOSO4nU2JY2igOcTAng6oZKTuQfb7v9hX7f2dWRfPDA8Q8xgZUQaqlmv6XmUjTUpka3I2eQ4YqfL2SxQloH589oteeqEXEqcs1CegIW0QlX3eXtfKZmtfY7c0QIoW3sp8ZawRcBCWqEK+1lE/Oz3FD8AwhYBC3FClVxGOjHr6WRClXsNRQAg4bB13YYtG7TmFAsBC/uFqvYavQQr7jbzSBa62/KmIABsQ2a+q0Cf9X3Nlu2r5ITwzr5mbP2QLu4iTDNYVXJ3if3nP+SshXCVvYoiAHp5Yjaxf/5uX/I3ZNAZmvUTKL7IbvL2NaY20sMMVjqhqj07OdPGAwBIP2TJuih5IsRUt1xpl3KEPEGTk3I5GZc9/ZjVImBBg1V7JpLUgnVtrKFnzu7YXgJAj8NWbf/Utv+cRDhhHuhYcqFPp7hjM1MCVqnBqtLGUCX6FUcRvtsjRwaADILWj7NaZ3oSHYqEu7HuHH/DiSsBq5RgNdZgNaQ0ACD7sFWb9azW0IS/WiEnyrLVg3zu3frrsNUDASuvUMX6KgAoO2g19s+pXj6UW5ZPAo4Hbbg7s59/Q9AiYOUSrM41WLF3FQAQtCTYXMorwhWNAUErHLZp8BeuJFh90YM5ZLiSxtJQAwCQfNiSO/4O7D+PTdjnkbZBS7Z5uORh034wg+U+WIU+I+kGK85IAKB/QUt2Zp9HuPmJGS0CVi+ClTSIGFsbEKwAII+gVZv1gvhYQevEfvYVdx0SsFIJVkP759aE39KAYAUABC2XVuOZ/VxZNzxhHy0CVqxg1S5gv4jw8TM9+AlWAFBG0Ap5hUQ+50E3LGWs2RGL3HcLV3Kwf4oQruRgP7AH+ykHPACUE7Ts653956kJexPT2KwXwp9TC9tjBmu7YCWzVnI58CjwR8tZzBXTtQBQdNCSk+yZ3Plnwm3/I59xbT/zgwQ8nnO4OWawNg9XlVlvuxAyXMmBfGwP6EPCFQBAg5YELNneYRbwY2UM/MRsFgHLdbiSa98PJux+Vlf29U5v3wUAoBuylrJcRMYJE24PrXY26569s17HJcK/Dlar5ziZsFsvSENJYRq24QjopYVJ9wHi+Ov2NqQYsEPQkjZ/qHswXgeaCJArOZX9zGOurryMGayXw5UcrA8Bw5UsWm8vB6YQbr4WVt8xBzeXNyx8o/X2NmAB+wStmVlfNgx11UOC3IOuBwMBa+PBVs4Cbk24S4LSIA64HGjeR/zsmAFrkUn9DQv97L73dzEv9bylBpyGLLlsKI/dOQwY2i/sMfTAJUMC1qsdjRwoZr2/VQjtrNUx2y4UHQ4ow35/dt/b7ijiZw+oNy9BqzbrtVnTQB9ZmfVs1siAgPXCWdyDCbd+JfVZqxizKlXE3xvzTNrlmWZdaBm+7XlbeSw0nEZr87p2KVs6mzUx6wdJhwiTI0IWAeu5cCUHxJdAZ3JyoJ/2YNZqGbEuYjiKWNZf+15vCQTkqrS24tD7wtp6DnW2TdBancwHOvmSiYpPuoaZgEW4WjXyUFswrO726MODNCPeGXIS6RiIeRbfZHJWPtD94kLXX2UiXmpyVOZ1xHo7KqWt/9AXF0Nns2Rd1iTQR94SsgoPWIHD1UzDVZ8adhPhM2M0ypPI5bxI/P1SL8scBuom4m8YRBoMjzJqc30JWrImS9ZmhZjBKz5kFRuwAoer054+PzBGJzQIuVOwbs8QtRPwELpjDh7jkJd+9LPGfW8jujVLzJAV9Lmq2saHEX9vzDVvsUOWHLOhLhkWHbKKDFgBw5UEqnd9uCSYWCd0EXBfqlAb872kzqjevneqmX6W77KuI/6OYaj9jLRtX0SutyJnsDohq71kGGJsKjZkFRew9G7B+wCD6uosoed3qsTq8Fd15HtfFW30R5HL+DGjemuNbNneBmjLoZ+y4LusYwfjC98DYcD+9y/7Zh5Y/D1oyaN2TkOcyJZ4d2FRAauzFcMwQKd72Pe9rTQcxuqI2lt+h56OBRlIbhMo5rmHemsSOEMf+3peme5XJ4N07LNi1wN1ncDx6G22QdtyyKdjpFzOKfXzM+N/K4d21/eiQlZpM1jXARr3TB93k8ttwDE7I6krp09vl05eB+cUwlXjcYbzLoHfJ7ODX1wO2PpeX0z8mUfnZaxhLZWQde/y5Ebr7VMC4SqVtpFayJITvcMAIeu2pB3f35TyQ3WQvg4Qrk4zK7dKzzqjhxH7urGv+S6zBnrmdKYDcyoNfKobAfqaLfiS0KEkdSad+N22oVLr7kTrbpjQbzpwfakpoZnV732atLtdTgT0GDzSdpdKvclJzQGR6i/bmu/1yXN9nA8Bi4Om3HDVKb8viQ1sC3191b/PnXUN9SU7fFcJhSqvA/QP9RbyyQTbqjV0vbTJ6m9af6l+fy+DhJ7df0nweF1qW3vs/Pu5GYqR1t3IpDFb9aOJblWAuOPlaY9v/trYL4UcM74f3JxtuFJXiZ1Vp9p5bxUwAiy0vUo4oFQ9r78bH28qSwvsACfvfZHY7x1onfW53iQYZj+oOzgGF/YYPPQcsmTRe537zQbZr8HSW499Dsa5h6vV2bop6NESAUOr746yNizo9RWOfZbrlPbmJxRntDbWe8gyftdkDRI7aSdg7RCuhmZ9/d+XRQHhymindGPQlwE6aJAjHNPeemCpwRXbhSyf41uV+/5Yuc9g+dxEstGEX0pjuzRxd5rOySRgvUmQm1PkzswDhWNmsRy3OWavduo/5p5D1nXOdxVmG7D07jdft3JLQz0usMGeGjjos4JvPjthsHbW7k8DHSRL2pszdQkLqj0ei1J2vspPwtV5rmWX8wyWz0Wik57v0L5rQ6sNi0T30ZgIl+x0IemE4t//BCPkSZXOHtDeehKKMyf9h68x7yzXWawsA5bOXlWe3n5e+NmQz4aWu2iznp7PQksw08BDe+tZf8VjcZz0Hz6DarazWLnOYPla2F782VCnoXHJaTunCcx6MljvJtrNLLS3fYuPS4MOC1P6Dl8z8FnOYmUXsDq7B/s6G1rS0FYN7dhgU7MUOno9dg8JWduFKxP5ZpYAt8zn2ua4LO7+WLz01H8MTBqPvyJgvZaEPb0vCyX/3NBqw9qGTTv604TqjZC1ZbhK4aSKkNXfNpchX8H1LLeCyjFg+UrB7Cf0c6c/I2T1r6MnZPUrXBGyCFcJnlzXHt565PIB4wQsx/QZSj4qKOTGkH0MWe/o9H8+y0u5o++ELPbIemaQTi1cPROyCMc9a3OZ8TXhkNVlwtxmsE48ve8d7enVTv8dnf7KUgfnaQ/qbakPLGatyg+DdMprLTshi3DcszaXUZ8vEw5Nj8ZwApYDlY/Gy9qrjRpcY1/vTNmXUqXTOejbbKcOTKUH5NVJQl8G6U44PjZlzx7P+9jmMuHjcU6jnO4mfJPLD9FK+YeHt+aa/vZ1IZdqr42/vchSI2dyk0j7JLmuu0uzXmw6KKTuJJxc9Xn2Q/s+aW/jgroZaXOnBKuox93Q/vni4a2Pc+hLRU4zWCNP7/tIU9r67Fr2DZJLGKcm7+cXrgZns575mGdSdxKwDkz+D8Zt6+6g75eWdDZL2prMQuYeONpgxaxV/OOu8dS/j3Ipo18yqu/K0/vSiHdvgDP7Z6ZPTD/LqOHI4Hyz/on57Yumv2li600CyLnJa0Yr27pr12bpDLLU2TizYHXFco3kyDE3dPye73MpnJwuEV4bD9vt2wb9hjbkrI4kBMsixqOeDtgyS/WxxE5eQ/KJ6e9lXzlRuiup7jqbLp8ZP3dXhwjDc603TnTTPMYujfvn/sp63gMCVloV/eCh85ep97/TjLzUl3T8H3oQtqRj/2jWz6BsqLfvg/aHHoQtGZwfqbvv6yLbgJzyTPLyh3pj+5e0jyuZ1Lh2/b65TGz8wiHyl9h2wBNdsySvU+38ZdB+qwNAzMBVa71LB1/Twf9UbxJUZM3SVBdXtwP2+wQCV631tshlTZzDelu0/ZmG5ErrbBQ5cC079VYn8LxOMEY6k9MM1v/4aPzMYEWpSxkA2kHgN/33wOFAsNSOQf5+1n83dO5O6q7d7HfUqbv25ULTeX2l7pzVW9Wpp7ed9ubqZGfRaXffNFQ1zAr3/ri5NO4vEYrDHC4LM4P11wYUQZSz7XYArf9iEB/s8L41peu97tqZkrnDulsSoLzXW71BANs6DBOgUDJmsF73js4dAICfxt1b4+du1SxmsP7GIfKqEUUAAMBPKoqAgLWPDxQBAABPOustQcDa2VFOz0YCAMCBE4qgnIBV+wzrHCoAAHx//uXY1/vnckMSM1ibOWMWCwCAdcYy3GVfVMDyeaefHEgXHC4AgKKT1XqfwjOPH9EQsNLzzf9xdc4dhQCAksmjcXzOXhGwElQH+Ix7LhUCAEqkD30/8vwxjwSs9ITYDHRoX7c0MwBAYeFKruBcB/iobDb2ziZg6UN5Q1SMbNtwTXMDABQSruTKzb0Js7C9JmClqQ53vK2mSgEAyD1cPZgwm4oudLKEgJWgkNdubwlZAIACwlWoG7zqnMovq4Blk+/c/gmZfglZAADClRt3BKy0zQN/3i1rsgAAGYWrYYRw1Uyn00VO5ZhjwLqLczye37KFAwCg5+FKQtWnwOEq1thNwNqGPsOoifDRY0n8mvwBAOhbuBpruIoxWTAjYPXDVaTPXSV/e5Ae0VQBAD0JVgO5CmPi7fM4m06nDQGrH0Ivdu9a7RfCJUMAQA/CVXtJcBzxa9zlWLZZBizdR+Mm8teQg1VmsyqaMAAgwXB1qeFqGPFr1Lq0Jzu/ZHzsTM36id8xZ5HkoJV1WTP7d5LTBmoAgN4GKznxv40crFpXuZbzmwLS+UUiX2epIWtG8wYARBgTZcJBthUaJ/KVZPbqkIDV3wPqSyIpvbXQoFXT3AEAgcbCc7OecEhpbfBBjovbSwpYckfffYJfba5Bq6Hpo3O8ypllQwAH4HAMlFmrYWJfzXZz00nOZf+mkANMAlaqWyfM7OuKoAU9Vi/1LJMADmCfvqTSvqRK8OtJv/Yu93XJpQQsSe6xNk8jaGGXgNW60jM9bpAA0Pdg1TrWZwdn7U1BB93YxNtEjaCFXQOW4AYJADkEK2MKuDRYXMDSAzDlS4XPBa071uIQsDq4QQLAc5MHsiXRqAdfVyYO3pUyI19awJJLhLE3VdtWrUFrRldSfMBqsT4LKLufkLGsDVZ9Gc8kVB3afmtRSj29KfDAlJT/YNJej/VS8pfHCbAeh4DVdlY3HA9AceOXhKqjHo5hp6VNFLwp9CCV5H/b458gBymXD8sOWN3gfcUMJ5D9mHVi0l9f9eKYZfuo09Lq7U3BB6zsC3Le858hg+udyfRJ5ASsrdQatAjdQB59QZ9nq/7UN+W8WzsB6+UDWGaxxpn8HFmX85GZjGID1vczRcNdqEBf23+7tkpmq0YZ/CRZb3VY6jKGNxzMq/VYo4x+1rITtuYGpQWs9hi4sfV/SYkCvRiHZJbqg+nPXe6b9kMHJa8RfcPBnWXIImyVHbBajVnfbUjdA4Sq0GNPUXcMErDKDFmErXIDVqvWoLWghAFCFeGKgEXI8msVtuQvt/lnH7BaMw1a1DcQpj0PNUy9zzxUEa4IWISsFyw6YYuGkW/AajtA1mcB/tpwZdazVFVhYwnhioBFyNqgkcjs1qNhdivHgNVqzHrjv5pSB/Zqs0MNU22oGhRYDIQrAhYhawfSYGQQ/shgnFXAatUatBpKH9h4fJAg1V72GzJGmGP6EALWtg0pp32yXA7IMrtVE7iyCFitqVnvn8WMJfByoKo48f4pXB3SbxCw+jbg9S5wSWOjofX6eFtqyJpSEyBQEaheMTPcNEPActDgxqbfzy4MfUYjYeuzWc9yNRRJ7wK91Bnrs1BKmxt2AtWIQLWRK26UIWC5bITS6GRd1oDS2MqyG7gMs1x9CFituZ6hEpKRS/saaIDqBir69O368wmPZCNg+Wqc96a/TzRPhQzYC0JX8gHr+9mqfU2pI/Q4TL3Vfw8pmZ1Jn33KnYIELN8N91r+UBJeQ1dT4sxJwmv+OHNFyu1maJ4u7xGm3JtruOIki4AVpEHL7bmyLovpZb+DuoSuRw1gTe7rgnpwU8VCg1bN4YlIbaTS8PS2E6roh/2ZcOMLASvWWZOErIrSCD7IS+D63P47l2nrHt21yvos+G4L7SxUOyvV/hvh+lkuCRKwGBSx0uhLZrza2a9ere/q2bG0euyOYX0Wdj/e23VSQ/M0K0WQio998QhYyZ1t3dIxJKvWQPC5E8SSW+fV07DeaGc84zDDhiGq3WsK6Z00yazVnKIgYKXYkcjgyAL4flmYpxmvb93/HPoMruezobUGrZpDqri+rw1L8vdX87QuihPO/mAhOwGrN53NreEullwDWKOvpev1CZlcbp5p0Go4dLLoz4bal7WB6ddOcKoood6Tdjph1oqA1beOKYfBEpupO2HsWyeQrf67Tc8KMzpmVuuz2O056f6pO8PUzjj9+sx/h3yx1oqA1fuzP+40hPkhdMlZ49dOKGs7uA8mr0vMnB3HC03df/9mnmbUCU5guxUCVlYd39j+uaZjQ6Fq7dC55XvzPuPHINQ9SesGJtY6YZuTPB7oTsDK9uxSZie4bIhSzTRoLTNu50Pz8/rL5/67tz8EqOf+bwDaHgELW3bAXDZEyWfR2azPsu35gbaMhNWG2WMCVoFBSzpluWzI9D5K1Jj1beE1AQvw0r5Y/0jAKj5ojc36suGQ0kChZ9infd3WgYCFxPBgdgIWXghaLIRHqXp5yzgBCwkFKx5dlZC/UQQJjS7rM44DGWTM0237QDHnGPb1xQYWnoQAbBesZMw4kHWNhKt0MIOV7llxe8fhmWFGC+VpTE/WZzGDhYjBihkrAhYIWsBOZIHuJOX1WQQsEKxAwMojaJ0YFsOjPFepDigELBCsQMDKJ2yNDXcdoswBJrm7owhY8KzRE4w5wYqAhbBB64TOHYVJ6jlqBCx4Isf3HdstELAQt4OvNGiNKQ0UJIn1WQQseDiub3gQMwELaQWtoYYsFsSjFNHXpRCw4Og4nmmwaigOAhbSDltt0OIxPCiBDEpXMS6nELCw73FrWF9FwEIvg9ZIg9aRYVYL+as1aNUELCRMTgTuuAxIwEIeQWugIYtZLZQygF2FuNxCwMKG5FiUy9kzZqsIWMg3bDGrhRKs1mfJ40MIWIh4DMqidWarCFgoMGyN7Z8PGraAXGcO5G7DOQELgUiYujOsrSJgAXoHYnsJcUiJINNBT4LWgoAFT0H+RkNVQ3GAgIXnBgy5hHiigYuwhdzMNGgtHbUXAlbZoaq9BLigOEDAwjaDR9UJW6zXQi6crc8iYBV57LCuCgQsOA1bErI+ELaQkca+TvcZKAlYRYWqj77W8iE/v1AE2JR2LPI6JWwBIFQBL2MGC3vTy4ht2BpSIujJ4Cn7ZE0dHP/MYOWjMaypAgELiYatkQYtCVxsaIoUTTVcscgdQoKUbKlQE6pAwEJfwtZQBx722UIKarNeb9U4Ps4JWP2y1GPho4aqhiIBAQt9D1wSst4bLiUirMbsuZCdgNV7Cw1Vj6ynAgELuYetoXma3ZK/LJSHazwqp+y6lyD1aJilAgELhQeu0Q+BC9jHzDjcTJSA1YtAVXcCFWupQMACXhi0Kh203jN4YQu18fA4HAJWsnXdBqqa4kBq2AcLSdIOsyZwYUON8fhAZ0TXzlB9JlCBgAX4D1yjTuBiDVe5A6/3dVaIEphlFpJLfugtLhEiC7qGqw1c7b+Rt5lZ72fVRD72uES4v/Yuv3aGqqFIQMAC0gxcAw1ZVSd0McuVh1qDVZ3IsUbA2k6jgYrLfSBgAZmErqF5mt0idPVzYJZgNUvsuCJgvWxpni71yd8Fs1MgYAFlhq6hYRPUFAfpG7Naiud/2wUC1l4BuJ2ZIkyBgEURAD8NmN3Li79p4GIAjUPuCpykPFAXGrBqDVFfNUjVHKoAAQvYdSAdadiSv287/4Z7Cw1WdQ+Oi5wDlpR/o0Fq9W9mpQACFhBqgB2ap1muX83TJUfWd21vqcFq1qP673vAaszT5b2v+pcgBeyJfbCAPelA1JjOPl2dwbfSoCWBq73cSPh63pVJdJ1VBprOqw1RSy7tAf4wgwVEopccJWhV+l+Vusg++XVWr9RjCjNY7d168vdz9z+zSScQBzNYQCSdga/uDNaX9s9FIUUggeqUWZSNtGUkx8w38zQbRYACCFgAsCKzK7Kf1bTwcmhDUjc4dcMU66AAAhYAbGSq4Sq3dVb1DwHyc+c/t5fuCE0AAQsAnAeQ0xzDhf1Nh1QvAAIWgJAawzorAAQsAHBi9XgbG6wuKQoABCwA2N/MrLddYD8rAAQsANhTrcGKbQMAELAoAgB7ajRYzSkKACBgAdjPap2V4fE2AEDAAuDEzKz3s2ooCgAgYAHYT63BqqYoAICABWA/jQarGUUBAAQsAPu7MqyzAgACFgAn5K7ACeusAICABWB/Cw1WNUUBAAQsAPtZarCaURQAQMACsD/WWQEAAQuAI7V9nbLOCgAIWAD212iwqikKACBgAdiPXAKU/aymFAUAELAA7G+q4Yp1VgBAwAKwp9qwzgoACFgAnJBAJdsuzCkKACBgAdiPXAK8scHqkqIAAAIWgP3NzHrWinVWAEDAArCnWoPVgqIAAAIWgP00Zn1n4IyiAAACFoD9rNZZGR5vAwAELABOzMx61qqhKACAgAVgP7UGq5qiAAACFoD9yCXACeusAICABcCNK8M6KwAgYAFwQnZfn7DOCgAIWAD2J/tYHbLOCgAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAMjG/xdgACa5+Ra/oI9zAAAAAElFTkSuQmCC" />
                                    </pattern>
                                </defs>
                                <rect id="icone-360" width="128" height="78" fill="url(#pattern)" />
                            </svg>
                        </figure>
                    </div>
                </div>
            </div>
        </section>
    <?php
    }
    ?>
    <section class="volta" style="--elemento: url(<?php echo get_field('elemento_grafico')['url']; ?>); ">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-6 py-4 pl-md-5 titulo" style="background-image: url('<?php echo get_field('imagem_volta'); ?>');">
                    <h2><?php echo get_field('titulo_volta'); ?></h2>
                </div>
                <div class="col-12 col-md-6 py-5 pt-md-5 pb-mb-4 pl-md-5" style="background-color: <?php echo get_field('color_bg_volta'); ?>; border-color: <?php echo get_field('color_borda'); ?>">
                    <div class="mb-4">
                        <?php while (have_rows('guia')) {
                            the_row(); ?>
                            <div class="d-flex w-100 align-items-center">
                                <figure class="mr-3">
                                    <img src="<?php echo get_sub_field('icon')['url']; ?>" alt="<?php echo get_sub_field('conteudo'); ?>">
                                </figure>
                                <span>
                                    <?php echo get_sub_field('conteudo'); ?>
                                </span>
                            </div>
                        <?php } ?>
                    </div>
                    <?php if (get_field('arquivo_para_download')) { ?>
                        <p class="text-center"><b><?php echo get_field('instrucoes'); ?></b></p>
                        <a href="<?php echo get_field('arquivo_para_download')['url']; ?>" class="btn" style="background: <?php echo get_field('baixar-bg');?>; color:<?php echo get_field('baixar-color');?>" download="download">Baixar</a>
                    <?php } ?>
                </div>
            </div>
        </div>
    </section>
    <section id="localizacao" class="py-5">
        <div class="container">
            <div class="row justify-content-center pb-5">
                <h2 class="mb-0" style="color: <?php echo get_field('map_titulo_cor');?>"><?php echo get_field('Mapa_titulo'); ?></h2>
            </div>
        </div>
        <div id="maps" class="acf-map" data-zoom="16">
            <?php while (have_rows('pings')) : the_row();
                $location = get_sub_field('ping');
            ?>
                <div class="marker" data-lat="<?php echo esc_attr($location['lat']); ?>" data-lng="<?php echo esc_attr($location['lng']); ?>"></div>
            <?php endwhile; ?>
        </div>
        <div id="contato">
            <div class="container">
                <div class="row pt-5 justify-content-center">
                    <?php
                    if (have_rows('enderecos')) {
                        while (have_rows('enderecos')) {
                            the_row(); ?>
                            <address class='px-4 text-center'>
                                <span><?php echo get_sub_field('linha_1'); ?></span>
                                <span><?php echo get_sub_field('linha_2'); ?></span>
                                <span><?php echo get_sub_field('linha_3'); ?></span>
                            </address>
                    <?php }
                    }
                    ?>
                </div>
            </div>
        </div>
    </section>
<div id="mytour" class="modal">
    <div class="modal-dialog">
        <button type="button" class="close" data-dismiss="modal">x</button>
        <iframe src="<?php echo get_field('link_tour'); ?>" width="100%" height="100%" frameborder="0"></iframe>
    </div>
</div>
<?php get_footer(); ?>