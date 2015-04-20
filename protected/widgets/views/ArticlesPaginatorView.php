<div class="q-pagination">
        <span class="q-pagination">
                <?php for($i=$StartPage;($i<$EndPage && $i<$CountPage-2);$i++) { ?>
                        <a href="<?= $UrlPath;?>page/<?=$i;?>" class="<?=($CurrentPage==$i)?'current-page':'';?>" ><?=$i+1;?></a>
                <?php } ?>
                        ...
                <a href="<?= $UrlPath;?>page/<?=$CountPage-2;?>"><?=$CountPage-1;?></a>
                <a href="<?= $UrlPath;?>page/<?=$CountPage-1;?>"><?=$CountPage;?></a>
        </span>
</div>
