<?php 
    include("../controllers/main.php");
    /* hago el includo del menu del usuario*/
    include("header_user.php");
?>
        <div id="cont_general">
            <div id="cuerpo">
                <div id="item-pendientes"><h2><i class="fa fa-tasks" aria-hidden="true"></i>&nbsp; <b>Tareas pendientes</b></h2>
                    <ul>
                        <?php if ($query1->num_rows > 0 ){
                            while ($r1=$query1->fetch_array()):
                        ?>
                        <li>
                            <?php 
                                  /* si la fecha de finalizar la tarea es menor que la actual es porque se vencio */
                                  if ($r1["fecha_fin"] <= $fch_act || $r1["estado"] != 'completo'){ ?>
                                       <div class="tarea_vencida">
                            <?php }else{
                                    /* si la fecha de inicio y de finalizar la tarea es mayor que la actual es porque se esta por vencer la tarea */
                                    if ($r1["fecha_fin"] >= $fch_act && $r1["fecha_inicio"] > $fch_act || $r1["estado"] != 'completo'){ ?>
                                      <div class="tarea_a_vencer">  
                            <?php    }else{ ?>
                                        /* en caso contrario van bien de tiempo entonces no la resalto la muestro normal */
                                        <?php if ($r1["estado"] == 'completo'){ ?>
                                            <div class="tarea_detalle">
                                        <?php }
                                     }
                                  } ?>
                                <h3><a href="tarea.php?id=<?php echo $r1["id_tarea"];?>" > <?php echo $r1["nombre"]; ?> </a></h3>
                                <p><i class="fa fa-bars" aria-hidden="true"></i> <i class="fa fa-check-square-o" aria-hidden="true"></i> 0/8 <i class="fa fa-calendar" aria-hidden="true"></i> <?php echo $r1["fecha_fin"]; ?><i class="fa fa-user-o" aria-hidden="true"></i></p>
                                </li>                  
                        <?php endwhile; 
                            }else{
                               echo 'No hay resultados a mostrar';
                            }
                        ?>
                                       
                         </li>
                    </ul>
                </div>
                <div id="item-encurso"><h2><i class="fa fa-tasks" aria-hidden="true"></i>&nbsp; <b>Tareas en curso</b></h2>
                   <ul>
                            <?php if ($query2->num_rows > 0 ){
                            while ($r2=$query2->fetch_array()): 
                            ?>
                        <li>
                        <?php
                                      /* si la fecha de finalizar la tarea es menor que la actual es porque se vencio */
                                      if ($r2["fecha_fin"] <= $fch_act || $r2["estado"] != 'completo'){ ?>
                                           <div class="tarea_vencida">
                                <?php }else{
                                        /* si la fecha de inicio y de finalizar la tarea es mayor que la actual es porque se esta por vencer la tarea */
                                        if ($r2["fecha_fin"] >= $fch_act && $r2["fecha_inicio"] > $fch_act || $r2["estado"] != 'completo'){ ?>
                                          <div class="tarea_a_vencer">  
                                <?php    }else{ ?>
                                            /* en caso contrario van bien de tiempo entonces no la resalto la muestro normal */
                                           <?php if ( $r2["estado"] == 'completo'){ ?>
                                            <div class="tarea_detalle">
                                           <?php }
                                           }
                                      } ?>
                                    <h3><a href="tarea.php?id=<?= $r2["id_tarea"];?>" ><?php echo $r2["nombre"]; ?> </a></h3>
                                    <p><i class="fa fa-bars" aria-hidden="true"></i> <i class="fa fa-check-square-o" aria-hidden="true"></i> 0/8 <i class="fa fa-calendar" aria-hidden="true"></i> <?php echo $r2["fecha_fin"]; ?><i class="fa fa-user-o" aria-hidden="true"></i></p>
                                </div>
                            </li>
                            <?php endwhile; 
                                }else{
                                    echo 'No hay resultados a mostrar';
                                }
                            ?>
                          </li>  
                   </ul>
                </div>
                <div id="item-completas"><h2><i class="fa fa-tasks" aria-hidden="true"></i>&nbsp; <b>Tareas completas</b></h2>
                   <ul>
                       <li>
                           <?php if ($query3->num_rows > 0 ){
                            while ($r3=$query3->fetch_array()):
                                  /* si la fecha de finalizar la tarea es menor que la actual es porque se vencio */
                                  if (($r3["fecha_fin"] <= $fch_act || $r3["estado"] != 'completo')){ ?>
                                       <div class="tarea_vencida">
                            <?php }else{
                                    /* si la fecha de inicio y de finalizar la tarea es mayor que la actual es porque se esta por vencer la tarea */
                                    if ($r3["fecha_fin"] >= $fch_act && $r3["fecha_inicio"] > $fch_act || $r3["estado"] != 'completo'){ ?>
                                      <div class="tarea_a_vencer">  
                            <?php    }else{ ?>
                                        /* en caso contrario van bien de tiempo entonces no la resalto la muestro normal */
                                        <?php if ( $r3["estado"] == 'completo'){ ?>
                                                <div class="tarea_detalle">
                                        <?php } ?>
                               <?php }
                                  } ?>
                                <h3><a href="tarea.php?id=<?= $r3["id_tarea"];?>"> <?php echo $r3["nombre"]; ?> </a></h3>
                                <p><i class="fa fa-bars" aria-hidden="true"></i> </i> 0/8 <i class="fa fa-calendar" aria-hidden="true"></i> <?php echo $r3["fecha_fin"]; ?> <i class="fa fa-user-o" aria-hidden="true"></i></p>
                            </li>
                        <?php endwhile; 
                           }else{
                               echo 'No hay resultados a mostrar';
                           }
                        ?>
                        </li>
                   </ul>
                </div>              
            </div>
            <div id="actividades">
                <div id="menu-item"><h2><a class="list-group-item" href="#"><i class="fa fa-cog fa-fw" aria-hidden="true"></i>&nbsp; Actividades</a></h2>
                    <ul class="estados_checklist">
                    <?php if ($actividades->num_rows > 0 ){
                            while ($r4=$actividades->fetch_array()):
                        ?>
                            <li><i class="fa fa-check-square-o" aria-hidden="true"></i> <?php echo $r4["detalle"]; ?> - <?php echo $r4["fecha_realizado"] ?> </li>
                        <?php
                            endwhile;
                         }else{
                             ?>
                               <li><?php echo 'No hay resultados a mostrar'; ?> </li>
                        <?php }
                        ?>
                    </ul>              
                </div>
            </div>
        </div>
        <!--div id="pie_pagina">
            <p>Power by Noe</p>
        </div--> 
        <!-- fin del contenedor principal-->
    </div>
</body>
</html>