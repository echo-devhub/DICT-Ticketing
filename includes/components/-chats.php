 <?php foreach ($chats as $chat) : ?>

     <?php if ($chat['sender_id'] == $sender) : ?>

         <?php if (!empty($chat['image_chat']) && !empty($chat['text_chat'])) : ?>

             <!-- outgoing message || message i send -->
             <div class="d-flex flex-column ms-auto p-1 mb-3 me-2">
                 <div class="chat_img mb-1 rounded overflow-hidden ms-auto" onclick="showImage(this)">
                     <img src="../../assets/media/photos/messaging/<?php echo $chat['image_chat']; ?>" alt="">
                 </div>
                 <div class="chat border-0 outgoing card ms-auto">
                     <div class="card-body p-2 text-break">
                         <?php echo $chat['text_chat']; ?>
                     </div>
                 </div>
                 <div class="text-end p-1">
                     <small class="date_send"><?php echo date('l, F d, Y', strtotime($chat['send_date'])); ?>
                         <i class="fa-solid fa-circle-check text-primary"></i></small>
                 </div>
             </div>
         <?php elseif (empty($chat['image_chat']) && !empty($chat['text_chat'])) : ?>
             <div class="d-flex flex-column ms-auto p-1 mb-3 me-2">
                 <div class="chat border-0 outgoing card ms-auto">
                     <div class="card-body p-2 text-break">
                         <?php echo $chat['text_chat']; ?>
                     </div>
                 </div>
                 <div class="text-end p-1">
                     <small class="date_send"><?php echo date('l, F d, Y', strtotime($chat['send_date'])); ?>
                         <i class="fa-solid fa-circle-check text-primary"></i></small>
                 </div>
             </div>
         <?php elseif (!empty($chat['image_chat']) && empty($chat['text_chat'])) : ?>
             <div class="d-flex flex-column ms-auto p-1 mb-3 me-2">
                 <div class="chat_img mb-1 rounded overflow-hidden ms-auto" onclick="showImage(this)">
                     <img src="../../assets/media/photos/messaging/<?php echo $chat['image_chat']; ?>" alt="">
                 </div>
                 <div class="text-end p-1">
                     <small class="date_send"><?php echo date('l, F d, Y', strtotime($chat['send_date'])); ?>
                         <i class="fa-solid fa-circle-check text-primary"></i></small>
                 </div>
             </div>
         <?php endif; ?>

     <?php else : ?>


         <?php if (!empty($chat['image_chat']) && !empty($chat['text_chat'])) : ?>
             <!-- incoming message || message i recieve-->
             <div class="d-flex flex-column mb-3 me-auto">
                 <div class="chat_img mb-1 rounded overflow-hidden ms-auto" onclick="showImage(this)">
                     <img src="../../assets/media/photos/messaging/<?php echo $chat['image_chat'] ?>" alt="">
                 </div>
                 <div class="d-flex">
                     <div class="avatar align-self-end me-2">
                         <img src="../../assets/media/photos/uploaded/<?php echo $agent_img; ?>" alt="img" />
                     </div>
                     <div class="chat p-1 card border-0 incoming">
                         <div class="card-body p-2 text-break">
                             <?php echo $chat['text_chat']; ?>
                         </div>
                     </div>
                 </div>
                 <div class="text-center p-1">
                     <small class="date_send"><?php echo date('l, F d, Y', strtotime($chat['send_date'])); ?>
                         <i class="fa-solid fa-circle-check text-primary"></i></small>
                 </div>
             </div>

         <?php elseif (empty($chat['image_chat']) && !empty($chat['text_chat'])) : ?>
             <div class="d-flex flex-column mb-3 me-auto">
                 <div class="d-flex">
                     <div class="avatar align-self-end me-2">
                         <img src="../../assets/media/photos/uploaded/<?php echo $agent_img; ?>" alt="img" />
                     </div>
                     <div class="chat p-1 card border-0 incoming">
                         <div class="card-body p-2 text-break">
                             <?php echo $chat['text_chat']; ?>
                         </div>
                     </div>
                 </div>
                 <div class="text-center p-1">
                     <small class="date_send"><?php echo date('l, F d, Y', strtotime($chat['send_date'])); ?>
                         <i class="fa-solid fa-circle-check text-primary"></i></small>
                 </div>
             </div>
         <?php elseif (!empty($chat['image_chat']) && empty($chat['text_chat'])) : ?>
             <div class="d-flex flex-column mb-3 me-auto">
                 <div class="d-flex">
                     <div class="avatar align-self-end me-2">
                         <img src="../../assets/media/photos/uploaded/<?php echo $agent_img; ?>" alt="img" />
                     </div>
                     <div class="chat_img mb-1 rounded overflow-hidden ms-auto" onclick="showImage(this)">
                         <img src="../../assets/media/photos/messaging/<?php echo $chat['image_chat'] ?>" alt="">
                     </div>
                 </div>
                 <div class="text-center p-1">
                     <small class="date_send"><?php echo date('l, F d, Y', strtotime($chat['send_date'])); ?>
                         <i class="fa-solid fa-circle-check text-primary"></i></small>
                 </div>
             </div>
         <?php endif; ?>

     <?php endif; ?>

 <?php endforeach; ?>