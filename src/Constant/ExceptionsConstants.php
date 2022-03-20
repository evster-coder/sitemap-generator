<?php

namespace Evster\SitemapGenerator\Constant;

final class ExceptionsConstants
{
    /**
     * Ошибка валидации
     */
    const VALIDATION_ERROR = 1000;

    /**
     * Ошибка записи в файл
     */
    const FILE_ERROR = 1001;

    /**
     * Не поддерживаемое разрешение файла для генерации
     */
    const UNSUPPORTED_FILE_EXTENSION = 1002;

    /**
     * Не настроен файл конфигурации
     */
    const CONFIGURATION_ERROR = 1003;
}
