/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(document).ready(function () {
    $("#fcontacto").submit(function (event) {
        event.preventDefault();
        $.ajax({
            type: 'POST',
            url: '../../send.php',
            data: $(this).serialize()            
        });
        return false;
    });
});

