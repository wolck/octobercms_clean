<?php if ($this->previewMode): ?>

    <div class="form-control"><?= Backend::dateTime($value, [
        'format' => $format,
        'formatAlias' => $formatAlias,
        'defaultValue' => $value,
        'useTimezone' => $useTimezone
    ]) ?></div>

<?php else: ?>

    <div
        id="<?= $this->getId() ?>"
        class="field-datepicker"
        data-control="datepicker"
        <?php if ($formatMoment): ?>data-format="<?= $formatMoment ?>"<?php endif ?>
        <?php if ($minDate): ?>data-min-date="<?= $minDate ?>"<?php endif ?>
        <?php if ($maxDate): ?>data-max-date="<?= $maxDate ?>"<?php endif ?>
        <?php if ($yearRange): ?>data-year-range="<?= $yearRange ?>"<?php endif ?>
        <?php if ($disableDays): ?>data-disable-days="<?= e(json_encode($disableDays)) ?>"<?php endif ?>
        <?php if ($firstDay): ?>data-first-day="<?= $firstDay ?>"<?php endif ?>
        <?php if ($twelveHour): ?>data-twelve-hour="1"<?php endif ?>
        <?php if ($hoursOnly): ?>data-hours-only="1"<?php endif ?>
        <?php if ($defaultTimeMidnight): ?>data-default-time-midnight="1"<?php endif ?>
        data-show-week-number="<?= $showWeekNumber ?>"
        <?php if (!$useTimezone): ?>data-ignore-timezone<?php endif ?>
    >

        <?php if ($mode == 'date'): ?>
            <?= $this->makePartial('picker_date') ?>
        <?php elseif ($mode == 'datetime'): ?>
            <div class="row">
                <div class="col-md-7">
                    <?= $this->makePartial('picker_date') ?>
                </div>
                <div class="col-md-5">
                    <?= $this->makePartial('picker_time') ?>
                </div>
            </div>
        <?php elseif ($mode == 'time'): ?>
            <?= $this->makePartial('picker_time') ?>
        <?php endif ?>

        <!-- Data locker -->
        <input
            type="hidden"
            name="<?= $field->getName() ?>"
            id="<?= $field->getId() ?>"
            value="<?= e($value) ?>"
            data-datetime-value
        />

    </div>

<?php endif ?>
