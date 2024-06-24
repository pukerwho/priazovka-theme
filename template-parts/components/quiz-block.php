<?php $random_number = random_int(1, 2); ?>
<div class="border-t dark:border-gray-500 pt-5 mt-5">
  <div class="bg-gray-200 dark:bg-gray-500 rounded-lg p-2">
    <div class="text-center font-bold mb-4"><?php _e("Угадайте фильм по эмодзи", "treba-wp"); ?></div>
    <?php if ($random_number === 1): ?>
      <div>
        <div class="text-3xl text-center mb-4">🕷️ 🚶‍♂️</div>
        <div class="emoji-question-js bg-gray-500 dark:bg-gray-200 text-center text-gray-100 dark:text-gray-900 rounded-lg cursor-pointer px-4 py-2"><?php _e("Узнать ответ", "treba-wp"); ?></div>
        <div class="emoji-answer-js hidden bg-gray-500 dark:bg-gray-200 text-center text-gray-100 dark:text-gray-900 rounded-lg px-4 py-2"><?php _e("Человек-паук", "treba-wp"); ?></div>
      </div>
    <?php endif; ?>
    <?php if ($random_number === 2): ?>
      <div>
        <div class="text-3xl text-center mb-4">👩‍❤️‍👨🚢🥶</div>
        <div class="emoji-question-js bg-gray-500 dark:bg-gray-200 text-center text-gray-100 dark:text-gray-900 rounded-lg cursor-pointer px-4 py-2"><?php _e("Узнать ответ", "treba-wp"); ?></div>
        <div class="emoji-answer-js hidden bg-gray-500 dark:bg-gray-200 text-center text-gray-100 dark:text-gray-900 rounded-lg px-4 py-2"><?php _e("Титаник", "treba-wp"); ?></div>
      </div>
    <?php endif; ?>
  </div>
</div>

<div class="border-t dark:border-gray-500 pt-5 mt-5">
  <div class="text-red-500 text-center text-lg mb-2"><?php _e("Опрос", "treba-wp"); ?></div>
  <div class="text-center font-bold mb-4"><?php _e("Ваша любимая пора года?", "treba-wp"); ?></div>
  <div>
    <div class="mb-4">
      <?php $vote_count = get_option("vote_timeyear_count"); ?>
      <!-- Winter --> 
      <?php 
        $winter_count = get_option("vote_winter");
        $winter_width = ($winter_count/$vote_count)*100;
      ?>
      <div class="flex items-center justify-between relative bg-gray-200 text-gray-600 dark:text-gray-200 dark:bg-gray-500 border border-transparent rounded cursor-pointer px-4 py-2 mb-2 vote-item" data-name="winter">
        <div class="item-show hidden h-full absolute bg-green-200 dark:bg-emerald-600 top-0 left-0" style="width:<?php echo $winter_width; ?>%"></div>
        <div class="relative">Зима</div>
        <div class="item-show hidden relative vote-item-result"><?php echo get_option("vote_winter"); ?></div>
      </div>

      <!-- Spring --> 
      <?php 
        $spring_count = get_option("vote_spring");
        $spring_width = ($spring_count/$vote_count)*100;
      ?>
      <div class="flex items-center justify-between relative bg-gray-200 dark:text-gray-200 dark:bg-gray-500 border border-transparent rounded text-gray-600 cursor-pointer px-4 py-2 mb-2 vote-item" data-name="spring">
        <div class="item-show hidden h-full absolute bg-green-200 dark:bg-emerald-600 top-0 left-0" style="width:<?php echo $spring_width; ?>%"></div>
        <div class="relative">Весна</div>
        <div class="item-show hidden relative vote-item-result"><?php echo get_option("vote_spring"); ?></div>
      </div>

      <!-- Summer --> 
      <?php 
        $summer_count = get_option("vote_summer");
        $summer_width = ($summer_count/$vote_count)*100;
      ?>
      <div class="flex items-center justify-between relative bg-gray-200 dark:text-gray-200 dark:bg-gray-500 border border-transparent rounded text-gray-600 cursor-pointer px-4 py-2 mb-2 vote-item" data-name="summer">
        <div class="item-show hidden h-full absolute bg-green-200 dark:bg-emerald-600 top-0 left-0" style="width:<?php echo $summer_width; ?>%"></div>
        <div class="relative"><?php _e("Лето", "treba-wp"); ?></div>
        <div class="item-show hidden relative vote-item-result"><?php echo get_option("vote_summer"); ?></div>
      </div>

      <!-- Autumn --> 
      <?php 
        $autumn_count = get_option("vote_autumn");
        $autumn_width = ($autumn_count/$vote_count)*100;
      ?>
      <div class="flex items-center justify-between relative bg-gray-200 dark:text-gray-200 dark:bg-gray-500 border border-transparent rounded text-gray-600 cursor-pointer px-4 py-2 mb-2 vote-item" data-name="autumn">
        <div class="item-show hidden h-full absolute bg-green-200 dark:bg-emerald-600 top-0 left-0" style="width:<?php echo $autumn_width; ?>%"></div>
        <div class="relative"><?php _e("Осень", "treba-wp"); ?></div>
        <div class="item-show hidden relative vote-item-result"><?php echo get_option("vote_autumn"); ?></div>
      </div>
    </div>
    <div class="text-center font-medium"><?php _e("Всего голосов", "treba-wp"); ?>: <span id="vote-count"><?php echo $vote_count; ?></span></div>
  </div>
</div>