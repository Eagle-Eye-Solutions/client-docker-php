<?php

namespace Docker\API\Normalizer;

use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\SerializerAwareInterface;
use Symfony\Component\Serializer\SerializerAwareTrait;

class DeviceNormalizer implements SerializerAwareInterface, DenormalizerAwareInterface, DenormalizerInterface, NormalizerAwareInterface, NormalizerInterface
{
    use SerializerAwareTrait;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;

    public function supportsDenormalization($data, $type, $format = null)
    {
        if ($type !== 'Docker\\API\\Model\\Device') {
            return false;
        }

        return true;
    }

    public function supportsNormalization($data, $format = null)
    {
        if ($data instanceof \Docker\API\Model\Device) {
            return true;
        }

        return false;
    }

    public function denormalize($data, $class, $format = null, array $context = [])
    {
        $object = new \Docker\API\Model\Device();
        if (property_exists($data, 'PathOnHost')) {
            $object->setPathOnHost($data->{'PathOnHost'});
        }
        if (property_exists($data, 'PathInContainer')) {
            $object->setPathInContainer($data->{'PathInContainer'});
        }
        if (property_exists($data, 'CgroupPermissions')) {
            $object->setCgroupPermissions($data->{'CgroupPermissions'});
        }

        return $object;
    }

    public function normalize($object, $format = null, array $context = [])
    {
        $data = new \stdClass();
        if (null !== $object->getPathOnHost()) {
            $data->{'PathOnHost'} = $object->getPathOnHost();
        }
        if (null !== $object->getPathInContainer()) {
            $data->{'PathInContainer'} = $object->getPathInContainer();
        }
        if (null !== $object->getCgroupPermissions()) {
            $data->{'CgroupPermissions'} = $object->getCgroupPermissions();
        }

        return json_encode($data);
    }
}
