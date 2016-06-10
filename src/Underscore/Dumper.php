<?php


namespace Underscore;


class Dumper
{

    /**
     *  Output a message and terminate the current script
     */
    public static function stop()
    {
        echo '<hr><span style="color:#8b0000;">' . PHP_EOL;
        echo 'Script manually terminate on ' . self::_trace();
        echo '</span><hr>' . PHP_EOL;
        die();
    }

    /**
     * Simple variable dump.
     *
     * @param ...$arguments
     */
    public static function d(... $arguments)
    {
        if (empty($arguments)) {
            return;
        }

        foreach ($arguments as $argument) {
            echo '<div style="background:#f8f8f8;margin:5px;padding:5px;border: solid grey 1px;">' . PHP_EOL;
            echo self::_trace();
            echo '<pre style="margin:0px;padding:0px;">' . PHP_EOL;
            var_dump($argument);
            echo '</pre>' . PHP_EOL;
            echo '</div>' . PHP_EOL;
        }
    }

    /**
     * Dump variable and die.
     *
     * @param ...$arguments
     */
    public static function dd(... $arguments)
    {
        if (empty($arguments)) {
            return;
        }

        foreach ($arguments as $argument) {
            self::d($argument);
        }
        self::stop();

    }

    /**
     * Simple print variable.
     *
     * @param ...$arguments
     */
    public static function p(... $arguments)
    {
        if (empty($arguments)) {
            return;
        }

        foreach ($arguments as $argument) {
            echo '<div style="background:#f8f8f8;margin:5px;padding:5px;border: solid grey 1px;">' . PHP_EOL;
            echo self::_trace();
            echo '<pre style="margin:0px;padding:0px;">' . PHP_EOL;
            print_r($argument);
            echo '</pre>' . PHP_EOL;
            echo '</div>' . PHP_EOL;
        }
    }

    /**
     * Print variable and die.
     *
     * @param ...$arguments
     */
    public static function pd(... $arguments)
    {
        if (empty($arguments)) {
            return;
        }

        foreach ($arguments as $argument) {
            self::p($argument);
        }

        self::stop();
    }

    /**
     * Dump variable as string.
     *
     * @param ...$arguments
     */
    public static function ds(... $arguments)
    {
        if (empty($arguments)) {
            return;
        }

        foreach ($arguments as $argument) {
            echo '<div style="background:#fafafa;margin:5px;padding:5px;border: solid grey 1px;">' . PHP_EOL;
            echo self::_trace();
            echo '<pre style="margin:0px;padding:0px;">' . PHP_EOL;
            if (is_object($argument)) {
                var_dump('Class: ' . get_class($argument));
            } elseif (is_array($argument)) {
                var_dump('Array{' . count($argument) . '}');
            } else {
                var_dump((string)$argument);
            }
            echo '</pre>' . PHP_EOL;
            echo '</div>' . PHP_EOL;
        }
    }

    /**
     * Dump variable as string and die.
     *
     * @param ...$arguments
     */
    public static function dsd(... $arguments)
    {
        if (empty($arguments)) {
            return;
        }

        foreach ($arguments as $argument) {
            self::ds($argument);
        }

        self::stop();
    }

    /**
     * Print peak memory usage.
     */
    public static function mem()
    {
        echo '<div style="background:#fafafa;margin:5px;padding:5px;border: solid grey 1px;">' . PHP_EOL;
        echo self::_trace();
        echo '<pre style="margin:0px;padding:0px;">' . PHP_EOL;
        echo sprintf('%sK of %s', round(memory_get_peak_usage() / 1024), ini_get('memory_limit'));
        echo '</pre>' . PHP_EOL;
        echo '</div>' . PHP_EOL;
    }

    /**
     * Measure execution time.
     *
     * @param array $timers
     * @param int $status
     * @param string $label
     */
    public static function timer(&$timers, $status = 0, $label = null)
    {
        if (!is_array($timers) || $status === -1) {
            $timers = [];
        }
        $where = self::_trace();
        if (null !== $label) {
            $where = $label . ' - ' . $where;
        }
        $timers[] = ['where' => $where, 'time' => microtime(true)];
        if ($status === 1) {
            echo '<table style="border-color: black;" border="1" cellpadding="3" cellspacing="0">';
            echo '<tr style="background-color:black;color:white;"><th>_trace</th><th>dT [ms]</th><th>dT(cumm) [ms]</th></tr>';
            $lastTime = $timers[0]['time'];
            $firstTime = $timers[0]['time'];
            foreach ($timers as $timer) {
                echo sprintf('<tr><td>%s</td><td>%s</td><td>%s</td></tr>',
                    $timer['where'],
                    sprintf('%01.6f', round(($timer['time'] - $lastTime) * 1000, 6)),
                    sprintf('%01.6f', round(($timer['time'] - $firstTime) * 1000, 6))
                );
                $lastTime = $timer['time'];
            }
            echo '</table>';
        }
    }

    public static function trace()
    {
        echo self::_trace();
    }

    /**
     * Back_trace.
     *
     * @return string back_trace
     */
    private static function _trace()
    {
        $bt = debug_backtrace();
        $count = count($bt);
        $len = $count;
        for ($i = 0; $i < $count; $i++) {
            if (isset($bt[$i]['class']) && self::class !== $bt[$i]['class'] && 'Underscore\Loader' !== $bt[$i]['class']) {
                $len = $i + 1;
                break;
            }
        }
        $trace = $bt[$len];
        $line = $bt[$len - 1]['line'];
        $file = basename($bt[$len - 1]['file']);
        $class = (isset($trace['class']) ? $trace['class'] : $bt[$len - 1]['file']);
        if (isset($trace['class'])) {
            $type = $trace['type'];
        } else {
            $type = ' ';
        }
        $function = isset($trace['function']) ? $trace['function'] : '';

        return sprintf('%s%s%s() line %s <small>(in %s)</small>', $class, $type, $function, $line, $file);
    }
}