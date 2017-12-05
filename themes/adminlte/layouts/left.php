<aside class="main-sidebar">
    <?php

    use app\models\User;
    use dmstr\widgets\Menu;
    ?>
    <section class="sidebar">
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= $directoryAsset ?>/img/user2-160x160.jpg" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p>Selamat Datang</p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <?php
        $rolename = User::getRoleName();
        $idUser = Yii::$app->user->getId();
        $cekformulirMaster = Yii::$app->db->createCommand("select count(*) from formulir_master where idUser=" . $idUser . " and tahun=" . date('Y') . "")->queryScalar();
        $ListformulirMaster = Yii::$app->db->createCommand("select * from formulir_master where idUser=" . $idUser . " and tahun=" . date('Y') . "")->queryOne();
        $cekformulir = Yii::$app->db->createCommand("select count(*) from formulir where idFormulirMaster='" . $ListformulirMaster['idFormulirMaster'] . "'")->queryScalar();
        if ($rolename == 'kasek') {
            $menuItems[] = ['label' => 'Formulir Pegawai', 'url' => ['/formulir-master/kasek']];
        } else if ($rolename == 'admin') {
            $menuItems[] = ['label' => 'Input Pegawai', 'url' => ['/site/signup']];
        } else if (($cekformulir == 0) && ($cekformulirMaster == 1)) {
            $menuItems[] = ['label' => 'Formulir', 'url' => ['/formulir/index']];
        } else if (($cekformulir >= 1) && ($cekformulirMaster == 1)) {
            $menuItems[] = ['label' => 'Formulir', 'url' => ['/formulir-master/index']];
        } else {
            $menuItems[] = ['label' => 'Formulir Baru', 'url' => ['/formulir-master/create']];
        }
        ?>
        <?php
        echo Menu::widget([
            'options' => [
                "id" => "nav-mobile",
                "class" => "sidebar-menu tree",
                'data-widget' => 'tree'
            ],
            'items' => $menuItems,
        ]);
        ?>
    </section>
</aside>
