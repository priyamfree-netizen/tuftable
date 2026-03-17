<!DOCTYPE html>
<html lang="<?php echo e(app()->getLocale()); ?>" dir="<?php echo e(isRtl() ? 'rtl' : 'ltr'); ?>">
<head>
    <meta charset="UTF-8">
    <title><?php echo e($restaurant->name ?? 'Demo Restaurant'); ?> - <?php echo app('translator')->get('modules.order.kotTicket'); ?></title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'DejaVu Sans', 'Arial', sans-serif;
        }
        [dir="rtl"] { text-align: right; }
        [dir="ltr"] { text-align: left; }
        .receipt {
            width: <?php echo e($width - 10); ?>mm;
            padding: <?php echo e($thermal ? '1mm' : '6.35mm'); ?>;
            page-break-after: always;
        }
        .header {
            text-align: center;
            margin-bottom: 3mm;
        }
        .bold {
            font-weight: bold;
        }

        .restaurant-info {
            font-size: <?php echo e($width == 56 ? '8pt' : ($width == 80 ? '9pt' : '10pt')); ?>;
            margin-bottom: 1mm;
        }
        .order-info {
            text-align: center;
            border-top: 1px dashed #000;
            border-bottom: 1px dashed #000;
            padding: 2mm 0;
            margin-bottom: 3mm;
            font-size: <?php echo e($width == 56 ? '8pt' : ($width == 80 ? '10pt' : '10pt')); ?>;
        }
        .kot-title {
            font-size: <?php echo e($width == 56 ? '10pt' : ($width == 80 ? '14pt' : '16pt')); ?>;
            font-weight: bold;
            text-align: center;
            margin-bottom: 2mm;
        }
        .items-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 3mm;
            font-size: <?php echo e($width == 56 ? '8pt' : ($width == 80 ? '10pt' : '10pt')); ?>;
        }
        .items-table th {
            padding: 1mm;
            border-bottom: 1px solid #000;
        }
        [dir="rtl"] .items-table th { text-align: right; }
        [dir="ltr"] .items-table th { text-align: left; }
        .items-table td {
            padding: 1mm 0;
            vertical-align: top;
        }
        .qty {
            width: <?php echo e($width == 56 ? '20%' : ($width == 80 ? '15%' : '12%')); ?>;
            text-align: center;
        }
        .description {
            width: <?php echo e($width == 56 ? '80%' : ($width == 80 ? '85%' : '88%')); ?>;
        }
        .modifiers {
            font-size: <?php echo e($width == 56 ? '6pt' : ($width == 80 ? '8pt' : '9pt')); ?>;
            color: #555;
        }
        .footer {
            text-align: center;
            margin-top: 3mm;
            font-size: <?php echo e($width == 56 ? '7pt' : ($width == 80 ? '9pt' : '10pt')); ?>;
            padding-top: 2mm;
            border-top: 1px dashed #000;
        }
        .italic {
            font-style: italic;
        }
        .order-row {
            width: 100%;
            margin-bottom: <?php echo e($width == 56 ? '3px' : '5px'); ?>;
        }
        .order-row table {
            width: 100%;
            border-collapse: collapse;
        }
        .order-left {
            text-align: left;
            width: 50%;
        }
        .order-right {
            text-align: right;
            width: 50%;
        }
        .back-button {
            position: fixed;
            top: 10px;
            left: 10px;
            z-index: 1000;
            padding: 10px 20px;
            background-color: #3b82f6;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.2);
        }
        
        .back-button:hover {
            background-color: #2563eb;
        }

        @media print {
            @page {
                margin: 0;
                size: 80mm auto;
            }
            .back-button {
                display: none !important;
            }
        }
    </style>
</head>
<body>
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(isset($printingChoice) && $printingChoice === 'browserPopupPrint'): ?>
    <!-- Back button for PWA mode -->
    <button class="back-button" onclick="goBack()" id="backButton" style="display: none;">
        ← <?php echo app('translator')->get('app.back'); ?>
    </button>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    <div class="receipt">
        <div class="header">

            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(isset($kotPlace) && $kotPlace): ?>
                <div class="restaurant-info"><?php echo e($kotPlace->name); ?></div>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>
        <div class="kot-title">
            KOT <span class="bold">#<?php echo e($kot->kot_number); ?></span>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($kot->token_number): ?>
                <div style="font-size: <?php echo e($width == 56 ? '9pt' : ($width == 80 ? '12pt' : '14pt')); ?>; margin-top: 1mm;">
                    <?php echo app('translator')->get('modules.order.tokenNumber'); ?>: <span class="bold"><?php echo e($kot->token_number); ?></span>
                </div>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>
        <div class="order-info" style="margin-bottom: 3mm;">
            <div class="order-row">
                <!-- Row 1: Order Number (left), Table (right) -->
                <table>
                    <tr>
                        <td class="order-left">
                            <span class="bold">
                                <?php echo e($kot->order->show_formatted_order_number); ?>

                            </span>
                        </td>
                        <td class="order-right">
                            <span><?php echo app('translator')->get('modules.table.table'); ?>: <span class="bold"><?php echo e($kot->order->table ? $kot->order->table->table_code : '-'); ?></span></span>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="order-row">
                <!-- Row 2: Date (left), Time (right) -->
                <table>
                    <tr>
                        <td class="order-left">
                            <?php echo app('translator')->get('app.date'); ?>: <?php echo e($kot->created_at->timezone($kot->branch->restaurant->timezone)->format(dateFormat())); ?>

                        </td>
                        <td class="order-right">
                            <?php echo app('translator')->get('app.time'); ?>: <?php echo e($kot->created_at->timezone($kot->branch->restaurant->timezone)->format(timeFormat())); ?>

                        </td>
                    </tr>
                </table>
            </div>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($kot->order->waiter): ?>
            <div class="order-row">
                <!-- Row 3: Waiter (left), empty (right) -->
                <table>
                    <tr>
                        <td class="order-left">
                            <?php echo app('translator')->get('modules.order.waiter'); ?>: <span class="bold"><?php echo e($kot->order->waiter->name); ?></span>
                        </td>
                        <td class="order-right"></td>
                    </tr>
                </table>
            </div>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($kot->order->order_type): ?>
            <div class="order-row">
                <!-- Row 4: Order Type (left), Pickup Time if applicable (right) -->
                <table>
                    <tr>
                        <td class="order-left">
                            <?php echo app('translator')->get('modules.settings.orderType'); ?>: <span class="bold"><?php echo e(Str::title(ucwords(str_replace('_', ' ', $kot->order->order_type)))); ?></span>
                        </td>
                        <td class="order-right">
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($kot->order->order_type === 'pickup' && $kot->order->pickup_date): ?>
                                <?php echo app('translator')->get('modules.order.pickupAt'); ?>: <span class="bold"><?php echo e(\Carbon\Carbon::parse($kot->order->pickup_date)->timezone($kot->branch->restaurant->timezone)->format(timeFormat())); ?></span>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </td>
                    </tr>
                </table>
            </div>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>
        <table class="items-table">
            <thead>
                <tr>
                    <th class="description"><?php echo app('translator')->get('modules.menu.itemName'); ?></th>
                    <th class="qty"><?php echo app('translator')->get('modules.order.qty'); ?></th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $items = isset($kotPlaceId)
                        ? $kot->items->filter(function($item) use($kotPlaceId) {
                            return $item->menuItem && $item->menuItem->kot_place_id == $kotPlaceId;
                        })
                        : $kot->items;
                ?>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td class="description">
                            <?php echo e($item->menuItem->item_name); ?>

                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(isset($item->menuItemVariation)): ?>
                                <br><small>(<?php echo e($item->menuItemVariation->variation); ?>)</small>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $item->modifierOptions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $modifier): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="modifiers">• <?php echo e($modifier->name); ?></div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($item->note): ?>
                                <div class="modifiers"><strong><?php echo app('translator')->get('modules.order.note'); ?>:</strong> <?php echo e($item->note); ?></div>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </td>
                        <td class="qty"><?php echo e($item->quantity); ?></td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </tbody>
        </table>
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($kot->note): ?>
            <div class="footer">
                <strong><?php echo app('translator')->get('modules.order.specialInstructions'); ?>:</strong>
                <div class="italic"><?php echo e($kot->note); ?></div>
            </div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    </div>

    <script>
        // Only enable auto-close for browser popup print, not direct print
        <?php if(isset($printingChoice) && $printingChoice === 'browserPopupPrint'): ?>
        // Detect if running in PWA standalone mode
        function isPWA() {
            return (window.matchMedia('(display-mode: standalone)').matches) || 
                   (window.navigator.standalone === true) ||
                   (document.referrer.includes('android-app://'));
        }

        // Set cookie for server-side PWA detection
        if (isPWA()) {
            // Set cookie that expires in 1 hour
            const expires = new Date();
            expires.setTime(expires.getTime() + (60 * 60 * 1000)); // 1 hour
            document.cookie = 'pwa_mode=standalone; expires=' + expires.toUTCString() + '; path=/';

            // Also set session storage for consistency
            sessionStorage.setItem('is_pwa', 'true');
        }

        // Show back button if in PWA mode
        if (isPWA()) {
            const backButton = document.getElementById('backButton');
            if (backButton) {
                backButton.style.display = 'block';
            }
        }

        // Go back function
        function goBack() {
            if (window.history.length > 1) {
                window.history.back();
            } else {
                // If no history, redirect to orders page or home
                window.location.href = '<?php echo e(route("orders.index")); ?>';
            }
        }

        // Auto-trigger print dialog when page loads and close the window afterward
        window.onload = function() {
            // Only call print if not in an iframe
            if (window.self === window.top) {
                const closeAfterPrint = () => {
                    // In PWA, navigate back instead of trying to close the window
                    if (isPWA()) {
                        goBack();
                    } else {
                        window.close();
                    }
                };

                // Set handler for after print where supported
                if ('onafterprint' in window) {
                    window.onafterprint = function() {
                        closeAfterPrint();
                    };
                } else {
                    // Fallback: attempt to close shortly after print is triggered
                    setTimeout(closeAfterPrint, 1000);
                }

                window.print();
            }
        };
        <?php else: ?>
        // For direct print, just trigger print without auto-close
        window.onload = function() {
            // Only call print if not in an iframe
            if (window.self === window.top) {
                window.print();
            }
        };
        <?php endif; ?>
    </script>


</body>
</html>
<?php /**PATH C:\Users\denji\Downloads\TableTrack v1.2.70 Nulled\script\script\resources\views\pos\printKot.blade.php ENDPATH**/ ?>