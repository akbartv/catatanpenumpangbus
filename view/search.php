<div id="container">
<h3>Pencarian Data</h3>
<hr>
    <form method="post" action="index.php?page=search_input">
        <button class="search-submit-button">
            <i class="icon ion-android-search"></i>
        </button>
        <div id="searchtext">
        <input type="text" id="s" name="search" onkeyup="addDateSeparator(event,this,'dd/mm/yyyy')" style="border-top-right-radius: 0px; border-bottom-right-radius: 0px;" value="" placeholder="Masukkan tanggal">
        </div>
    </form>
    <?php
    if(isset($data)){
    ?>
    <br>
    <br>
        <table>
            <thead>
                <tr>
                    <th>Tanggal</th>
                    <th>Jam</th>
                    <th>No. Polisi</th>
                    <th>Nama Kru</th>
                    <th>Jumlah Penumpang</th>
                    <?php
                        if($_SESSION['level'] != 'pengontrol_lokasi'){
                        }else{
                        ?>
                        <th>Action</th>
                        <?php
                        }
                        ?>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($data == null) {
                    echo '<tr><td colspan="6" style="text-align:center;">Data tidak ditemukan.</td></tr>';
                }else{
                foreach($data as $key => $value){
                ?>
                <tr>
                    <td data-label="Tanggal"><?php echo $pencatatan->parseDate($value['tanggal']) ?></td>
                    <td data-label="Jam"><?php echo $pencatatan->cutTime($value['jam']) ?></td>
                    <td data-label="No. Polisi"><?php echo $value['no_polisi'] ?></td>
                    <td data-label="Nama Kru"><?php echo $value['nama_kru'] ?></td>
                    <td data-label="Jumlah Penumpang"><?php echo $value['jumlah_penumpang'] ?></td>
                        <?php
                        if($_SESSION['level'] != 'pengontrol_lokasi'){
                        }else{
                        ?>
                        <td data-label="Action">
                        <a href="index.php?page=edit_pencatatan&id_pencatatan=<?php echo $value['id_pencatatan'] ?>">
                            <i class="icon ion-edit"></i>  
                        </a>
                        
                        <a onclick="return confirm('Hapus data ini?')" href="index.php?page=delete_pencatatan&id=<?php echo $value['id_pencatatan'] ?>">
                            <i class="icon ion-android-delete"></i>
                        </a>
                        </td>
                        <?php
                        }
                        ?>
                </tr>
                <?php 
                }}
                ?>
            </tbody>
        </table>
    <?php
    }else{
        
    }
    ?>
</div>