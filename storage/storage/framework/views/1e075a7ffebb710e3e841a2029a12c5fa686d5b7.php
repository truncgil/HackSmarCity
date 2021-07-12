<div class="content">
    <div class="block">
            <div class="block-header block-header-default" >
                <h3 class="block-title"><i class="fa fa-list"></i> <?php echo e(e2("Sınav Listesi")); ?></h3>
            </div>
            <div class="block-content">
            <?php if(getisset("sinav-sil")) {
                db("sinavlar")->where("id",get("sinav-sil"))->delete();
                bilgi("Sınav başarılı bir şekilde silinmiştir");
            } ?>
                <?php $sinavlar = db("sinavlar")->orderBY("id","DESC")->get(); ?>
                <div class="table-responsive">
                    <table class="table table-borded table-striped">
                        <tr>
                            <th>Sınav Adı</th>
                            <th>Tarih</th>
                            
                            <th>Sınıflar</th>
                            <th>Dersler</th>
                            <th>Net Hesabı</th>
                            <th>Kazanımlar</th>
                            <th>Uygulayan Kişi Sayısı</th>
                            <th>Durum</th>
                            <th>İşlem</th>
                           
                        </tr>
                        <?php foreach($sinavlar AS $s) { 
                            $j = j($s->json);
                            $ders = j($s->dersler);
                            ?>
                        <tr>
                            <td><?php echo e($s->title); ?></td>
                            <td><?php echo e(df($s->date,"d.m.Y H:i")); ?></td>
                            <td><?php echo implode("<br>",$j['sinif']) ?></td>
                            <td>
                            <?php if($j['net']!="") { ?>
                            <?php echo e($j['net']); ?> Yanlış 1 doğruyu götürür
                            <?php } else {
                                echo "Yanlış doğruyu götürmez";
                            } ?>
                            </td>
                            <td>
                                <table class="table">
                                    <tr>
                                        <td>Ders</td>
                                        <td>Soru</td>
                                        <td>Optik</td>
                                        <td>Çarpan</td>
                                    </tr>
                                    <?php foreach($ders AS $d) {
                                
                                ?>
                                    <tr>
                                        <td><?php echo e($d['isim']); ?></td>
                                        <td><?php echo e($d['soru']); ?></td>
                                        <td><?php echo e($d['optik']); ?></td>
                                        <td><?php echo e($d['carpan']); ?></td>
                                    </tr>
                                    <?php 
                            } ?>
                                </table>
                            
                                
                                  
                            </td>
                            <td>
                                <?php if(isset($j['kazanim'])) {
                                     ?>
                                     <i class="fa fa-check"></i>

                                     <?php 
                                } else {
                                     ?>
                                     <i class="fa fa-times"></i>

                                     <?php 
                                } ?>
                            </td>
                            <td>
                                0
                            </td>
                            <td>
                                <select name="y" id="<?php echo e($s->id); ?>" class="form-control edit" table="sinavlar" >
                                    <option value="1" <?php if($s->y==1) echo "selected"; ?>><?php echo e(e2("Yayında")); ?></option>
                                    <option value="0" <?php if($s->y==0) echo "selected"; ?>><?php echo e(e2("Yayında Değil")); ?></option>
                                </select>
                            </td>
                            <td>
                                <div class="btn btn-group">
                                    <a href="?kazanimlar=<?php echo e($s->id); ?>" class="btn btn-primary"><?php echo e(e2("Kazanımlar")); ?></a>
                                    <a href="<?php echo e(url("admin/types/sonuclar?sinav=".$s->id)); ?>" class="btn btn-info"><?php echo e(e2("Sonuçlar")); ?></a>
                                    <a href="?sinav-sil=<?php echo e($s->id); ?>" teyit="<?php echo e(e2("Sınavı kalıcı olarak silmek istediğinizden emin misiniz?")); ?>" class="btn btn-danger"><?php echo e(e2("Sınavı Sil")); ?></a>
                                    <a href="?sinav-duzenle=<?php echo e($s->id); ?>" class="btn btn-warning"><?php echo e(e2("Düzenle")); ?></a>
                                </div>
                            </td>
                        </tr>
                        <?php } ?>
                    </table>
                </div>
            </div>
    </div>
</div><?php /**PATH /home/dijimind/app/resources/views/admin/type/sinavlar/sinav-listesi.blade.php ENDPATH**/ ?>