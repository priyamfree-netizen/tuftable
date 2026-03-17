<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames(([
    'shape' => 'circle', // circle or rectangle
    'seats' => 4,
    'code' => '',
    'status' => 'available',
    'isInactive' => false,
    'kotCount' => 0,
    'isReservationActive' => false,
    'reservationInfo' => null,
    'isLocked' => false,
    'lockedByCurrentUser' => false,
    'lockedByUserName' => '',
    'showAdminUnlock' => false,
    'tableId' => null,
    'waiters' => [],
    'currentWaiterId' => null,
    'onWaiterChange' => null
]));

foreach ($attributes->all() as $__key => $__value) {
    if (in_array($__key, $__propNames)) {
        $$__key = $$__key ?? $__value;
    } else {
        $__newAttributes[$__key] = $__value;
    }
}

$attributes = new \Illuminate\View\ComponentAttributeBag($__newAttributes);

unset($__propNames);
unset($__newAttributes);

foreach (array_filter(([
    'shape' => 'circle', // circle or rectangle
    'seats' => 4,
    'code' => '',
    'status' => 'available',
    'isInactive' => false,
    'kotCount' => 0,
    'isReservationActive' => false,
    'reservationInfo' => null,
    'isLocked' => false,
    'lockedByCurrentUser' => false,
    'lockedByUserName' => '',
    'showAdminUnlock' => false,
    'tableId' => null,
    'waiters' => [],
    'currentWaiterId' => null,
    'onWaiterChange' => null
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>

<?php
    $tableSize = match(true) {
        $seats >= 8 => 'h-48 w-48',
        $seats >= 6 => 'h-44 w-44',
        default => 'h-40 w-40'
    };

    $tableShape = $shape === 'rectangle' ? 'rounded-xl' : 'rounded-full';

    // Simple status-based styling
    $statusStyles = [
        'available' => [
            'table' => 'bg-green-100 border-green-300',
            'status' => 'bg-green-500',
            'text' => 'text-green-700'
        ],
        'reserved' => [
            'table' => 'bg-red-100 border-red-300',
            'status' => 'bg-red-500',
            'text' => 'text-red-700'
        ],
        'running' => [
            'table' => 'bg-blue-100 border-blue-300',
            'status' => 'bg-blue-500',
            'text' => 'text-blue-700'
        ]
    ][$status] ?? [
        'table' => 'bg-gray-100 border-gray-300',
        'status' => 'bg-gray-500',
        'text' => 'text-gray-700'
    ];

    // Override styling for locked tables
    if ($isLocked) {
        if ($lockedByCurrentUser) {
            $statusStyles = [
                'table' => 'bg-blue-100 border-blue-300',
                'status' => 'bg-blue-500',
                'text' => 'text-blue-700'
            ];
        } else {
            $statusStyles = [
                'table' => 'bg-orange-100 border-orange-300 opacity-75',
                'status' => 'bg-orange-500',
                'text' => 'text-orange-700'
            ];
        }
    }

    // Calculate positions for chairs
    $chairPositions = [];
    $baseRadius = match(true) {
        $seats >= 8 => 6,
        $seats >= 6 => 5.5,
        default => 5
    };

    $seats = min($seats, 12);
    for ($i = 0; $i < $seats; $i++) {
        $angle = ($i * 360 / $seats) - 90;
        $radian = deg2rad($angle);
        $radius = $baseRadius + (($i % 2) * 0.2);
        $x = cos($radian) * $radius;
        $y = sin($radian) * $radius;

        $chairPositions[] = [
            'x' => $x,
            'y' => $y,
            'rotation' => $angle + 90
        ];
    }
?>

<div class="relative group p-8" style="width: fit-content">
    <!-- Lock indicator -->
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($isLocked): ?>
        <div class="absolute top-2 right-2 z-20">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($lockedByCurrentUser): ?>
                <div class="bg-blue-500 text-white p-2 rounded-full shadow-lg cursor-help"
                     title="Locked by you">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 616 0z" clip-rule="evenodd"></path>
                    </svg>
                </div>
            <?php else: ?>
                <div class="bg-orange-500 text-white p-2 rounded-full shadow-lg cursor-help"
                     title="Locked by <?php echo e($lockedByUserName); ?>">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 616 0z" clip-rule="evenodd"></path>
                    </svg>
                </div>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    <!-- Admin unlock button -->
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($showAdminUnlock && $tableId): ?>
        <div class="absolute top-2 left-2 z-20">
            <button wire:click.stop='forceUnlockTable(<?php echo e($tableId); ?>)'
                    class="bg-red-500 hover:bg-red-600 text-white p-2 rounded-full shadow-lg transition-all duration-200 hover:scale-110"
                    title="Force unlock table (Admin only)">
                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 1a4.5 4.5 0 00-4.5 4.5V9H5a2 2 0 00-2 2v6a2 2 0 002 2h10a2 2 0 002-2v-6a2 2 0 00-2-2h-.5V5.5A4.5 4.5 0 0010 1zM8.5 5.5A1.5 1.5 0 0110 4a1.5 1.5 0 011.5 1.5V9h-3V5.5z" clip-rule="evenodd"></path>
                </svg>
            </button>
        </div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    <!-- Table -->
    <div <?php echo e($attributes->merge([
        'class' => "{$tableSize} {$tableShape} relative cursor-pointer transition-all duration-300 hover:scale-105 border-2 shadow-md " .
        $statusStyles['table'] . ' ' .
        ($isInactive ? 'opacity-50' : '') . ' ' .
        ($isLocked && !$lockedByCurrentUser ? 'cursor-not-allowed' : '')
    ])); ?>>

        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($shape === 'circle'): ?>
            <!-- Circle Layout: Text at top, Waiter select in middle -->
            <div class="absolute top-4 left-1/2 transform -translate-x-1/2 flex flex-col items-center z-10">
                <span class="text-xl font-bold <?php echo e($statusStyles['text']); ?>"><?php echo e($code); ?></span>
                <span class="text-xs font-medium text-gray-600"><?php echo e($seats); ?> <?php echo app('translator')->get('modules.table.seats'); ?></span>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($isReservationActive): ?>
                    <div class="mt-0.5 px-1.5 py-0.5 rounded text-xs font-medium bg-white shadow-sm text-red-600">
                        <?php echo app('translator')->get('modules.table.reserved'); ?>
                    </div>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($kotCount > 0): ?>
                    <div class="mt-0.5 px-2 py-0.5 rounded-full text-xs font-medium bg-white shadow-sm <?php echo e($statusStyles['text']); ?>">
                        <?php echo e($kotCount); ?> <?php echo app('translator')->get('modules.order.kot'); ?>
                    </div>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>

            <!-- Waiter Assignment Button - Center for circle -->
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!empty($waiters) && $tableId): ?>
                <div class="absolute top-[55%] left-1/2 transform -translate-x-1/2 -translate-y-1/2 z-30" wire:click.stop wire:key="waiter-select-<?php echo e($tableId); ?>">
                    <button wire:click='showWaiterSelect(<?php echo e($tableId); ?>)' class="<?php echo e($seats <= 5 ? 'text-[10px] px-1.5 py-0.5' : 'text-xs px-2 py-1'); ?> rounded-md border border-gray-300 bg-white shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white" <?php if($isLocked && !$lockedByCurrentUser): ?> disabled <?php endif; ?>>
                        <?php echo app('translator')->get('modules.table.assignWaiter'); ?>
                    </button>
                </div>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        <?php else: ?>
            <!-- Rectangle Layout: Original centered layout -->
            <div class="absolute inset-0 flex flex-col items-center justify-center">
                <span class="text-2xl font-bold <?php echo e($statusStyles['text']); ?>"><?php echo e($code); ?></span>
                <span class="text-sm font-medium text-gray-600"><?php echo e($seats); ?> <?php echo app('translator')->get('modules.table.seats'); ?></span>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($isReservationActive): ?>
                    <div class="mt-1 px-2 py-1 rounded text-xs font-medium bg-white shadow-sm text-red-600">
                        <?php echo app('translator')->get('modules.table.reserved'); ?>
                    </div>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($kotCount > 0): ?>
                    <div class="mt-2 px-3 py-1 rounded-full text-xs font-medium bg-white shadow-sm <?php echo e($statusStyles['text']); ?>">
                        <?php echo e($kotCount); ?> <?php echo app('translator')->get('modules.order.kot'); ?>
                    </div>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>

            <!-- Waiter Assignment Button - Bottom for rectangle -->
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!empty($waiters) && $tableId): ?>
                <div class="absolute bottom-1 left-1/2 transform -translate-x-1/2 z-30" wire:click.stop wire:key="waiter-select-<?php echo e($tableId); ?>">
                    <button wire:click='showWaiterSelect(<?php echo e($tableId); ?>)' class="<?php echo e($seats <= 5 ? 'text-[10px] px-1.5 py-0.5' : 'text-xs px-2 py-1'); ?> rounded-md border border-gray-300 bg-white shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white" <?php if($isLocked && !$lockedByCurrentUser): ?> disabled <?php endif; ?>>
                        <?php echo app('translator')->get('modules.table.assignWaiter'); ?>
                    </button>
                </div>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    </div>

</div>
<?php /**PATH C:\Users\denji\Downloads\TableTrack v1.2.70 Nulled\script\script\resources\views\components\restaurant-table.blade.php ENDPATH**/ ?>