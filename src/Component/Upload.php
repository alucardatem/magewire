<?php declare(strict_types=1);
/**
 * Copyright © Willem Poortman 2021-present. All rights reserved.
 *
 * Please read the README and LICENSE files for more
 * details on copyrights and license information.
 */

namespace Magewirephp\Magewire\Component;

use Magento\Framework\App\Filesystem\DirectoryList;
use Magento\Framework\Exception\FileSystemException;
use Magento\Framework\Filesystem;
use Magewirephp\Magewire\Exception\AcceptableException;
use Magewirephp\Magewire\Model\Upload\File\TemporaryUploader;
use Magewirephp\Magewire\Model\Upload\UploadAdapterInterface;
use Rakit\Validation\Validator;

abstract class Upload extends Form
{
    public const COMPONENT_TYPE = 'file-upload';

    protected UploadAdapterInterface $uploadAdapter;

    public function __construct(
        Validator $validator,
        UploadAdapterInterface $uploadAdapter
    ) {
        $this->uploadAdapter = $uploadAdapter;
    }

    public function getAdapter(): UploadAdapterInterface
    {
        return $this->uploadAdapter;
    }

    public function uploadErrored($name, $errorsInJson, $isMultiple)
    {
        $this->emit('upload:errored', $name)->self();

//        if (is_null($errorsInJson)) {
//            // Handle any translations/custom names
//            $translator = app()->make('translator');
//
//            $attribute = $translator->get("validation.attributes.{$name}");
//            if ($attribute === "validation.attributes.{$name}") $attribute = $name;
//
//            $message = trans('validation.uploaded', ['attribute' => $attribute]);
//            if ($message === 'validation.uploaded') $message = "The {$name} failed to upload.";
//
//            throw ValidationException::withMessages([$name => $message]);
//        }
//
//        $errorsInJson = $isMultiple
//            ? str_ireplace('files', $name, $errorsInJson)
//            : str_ireplace('files.0', $name, $errorsInJson);
//
//        $errors = json_decode($errorsInJson, true)['errors'];
//
//        throw (ValidationException::withMessages($errors));
    }

    public function removeUpload($name, $tmpFilename)
    {
//        $uploads = $this->getPropertyValue($name);
//
//        if (is_array($uploads) && isset($uploads[0]) && $uploads[0] instanceof TemporaryUploadedFile) {
//            $this->emit('upload:removed', $name, $tmpFilename)->self();
//
//            $this->syncInput($name, array_values(array_filter($uploads, function ($upload) use ($tmpFilename) {
//                if ($upload->getFilename() === $tmpFilename) {
//                    $upload->delete();
//                    return false;
//                }
//
//                return true;
//            })));
//        } elseif ($uploads instanceof TemporaryUploadedFile) {
//            $uploads->delete();
//
        $this->emit('upload:removed', $name, $tmpFilename)->self();
//
//            if ($uploads->getFilename() === $tmpFilename) $this->syncInput($name, null);
//        }
    }
}
