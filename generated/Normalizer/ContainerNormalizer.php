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

class ContainerNormalizer implements SerializerAwareInterface, DenormalizerAwareInterface, DenormalizerInterface, NormalizerAwareInterface, NormalizerInterface
{
    use SerializerAwareTrait;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;

    public function supportsDenormalization($data, $type, $format = null)
    {
        if ($type !== 'Docker\\API\\Model\\Container') {
            return false;
        }

        return true;
    }

    public function supportsNormalization($data, $format = null)
    {
        if ($data instanceof \Docker\API\Model\Container) {
            return true;
        }

        return false;
    }

    public function denormalize($data, $class, $format = null, array $context = [])
    {
        $object = new \Docker\API\Model\Container();
        if (property_exists($data, 'AppArmorProfile')) {
            $object->setAppArmorProfile($data->{'AppArmorProfile'});
        }
        if (property_exists($data, 'Args')) {
            $value = $data->{'Args'};
            if (is_array($data->{'Args'})) {
                $values = [];
                foreach ($data->{'Args'} as $value_1) {
                    $values[] = $value_1;
                }
                $value = $values;
            }
            if (is_null($data->{'Args'})) {
                $value = $data->{'Args'};
            }
            $object->setArgs($value);
        }
        if (property_exists($data, 'Config')) {
            $object->setConfig($this->serializer->denormalize($data->{'Config'}, 'Docker\\API\\Model\\ContainerConfig', 'raw', $context));
        }
        if (property_exists($data, 'Created')) {
            $object->setCreated($data->{'Created'});
        }
        if (property_exists($data, 'Driver')) {
            $object->setDriver($data->{'Driver'});
        }
        if (property_exists($data, 'ExecDriver')) {
            $object->setExecDriver($data->{'ExecDriver'});
        }
        if (property_exists($data, 'ExecIDs')) {
            $object->setExecIDs($data->{'ExecIDs'});
        }
        if (property_exists($data, 'HostConfig')) {
            $object->setHostConfig($this->serializer->denormalize($data->{'HostConfig'}, 'Docker\\API\\Model\\HostConfig', 'raw', $context));
        }
        if (property_exists($data, 'HostnamePath')) {
            $object->setHostnamePath($data->{'HostnamePath'});
        }
        if (property_exists($data, 'HostsPath')) {
            $object->setHostsPath($data->{'HostsPath'});
        }
        if (property_exists($data, 'LogPath')) {
            $object->setLogPath($data->{'LogPath'});
        }
        if (property_exists($data, 'Id')) {
            $object->setId($data->{'Id'});
        }
        if (property_exists($data, 'Image')) {
            $object->setImage($data->{'Image'});
        }
        if (property_exists($data, 'MountLabel')) {
            $object->setMountLabel($data->{'MountLabel'});
        }
        if (property_exists($data, 'Name')) {
            $object->setName($data->{'Name'});
        }
        if (property_exists($data, 'NetworkSettings')) {
            $object->setNetworkSettings($this->serializer->denormalize($data->{'NetworkSettings'}, 'Docker\\API\\Model\\NetworkConfig', 'raw', $context));
        }
        if (property_exists($data, 'Path')) {
            $object->setPath($data->{'Path'});
        }
        if (property_exists($data, 'ProcessLabel')) {
            $object->setProcessLabel($data->{'ProcessLabel'});
        }
        if (property_exists($data, 'ResolvConfPath')) {
            $object->setResolvConfPath($data->{'ResolvConfPath'});
        }
        if (property_exists($data, 'RestartCount')) {
            $object->setRestartCount($data->{'RestartCount'});
        }
        if (property_exists($data, 'State')) {
            $object->setState($this->serializer->denormalize($data->{'State'}, 'Docker\\API\\Model\\ContainerState', 'raw', $context));
        }
        if (property_exists($data, 'Mounts')) {
            $value_2 = $data->{'Mounts'};
            if (is_array($data->{'Mounts'})) {
                $values_1 = [];
                foreach ($data->{'Mounts'} as $value_3) {
                    $values_1[] = $this->serializer->denormalize($value_3, 'Docker\\API\\Model\\Mount', 'raw', $context);
                }
                $value_2 = $values_1;
            }
            if (is_null($data->{'Mounts'})) {
                $value_2 = $data->{'Mounts'};
            }
            $object->setMounts($value_2);
        }

        return $object;
    }

    public function normalize($object, $format = null, array $context = [])
    {
        $data = new \stdClass();
        if (null !== $object->getAppArmorProfile()) {
            $data->{'AppArmorProfile'} = $object->getAppArmorProfile();
        }
        $value = $object->getArgs();
        if (is_array($object->getArgs())) {
            $values = [];
            foreach ($object->getArgs() as $value_1) {
                $values[] = $value_1;
            }
            $value = $values;
        }
        if (is_null($object->getArgs())) {
            $value = $object->getArgs();
        }
        $data->{'Args'} = $value;
        if (null !== $object->getConfig()) {
            $data->{'Config'} = json_decode($this->serializer->normalize($object->getConfig(), 'raw', $context));
        }
        if (null !== $object->getCreated()) {
            $data->{'Created'} = $object->getCreated();
        }
        if (null !== $object->getDriver()) {
            $data->{'Driver'} = $object->getDriver();
        }
        if (null !== $object->getExecDriver()) {
            $data->{'ExecDriver'} = $object->getExecDriver();
        }
        if (null !== $object->getExecIDs()) {
            $data->{'ExecIDs'} = $object->getExecIDs();
        }
        if (null !== $object->getHostConfig()) {
            $data->{'HostConfig'} = json_decode($this->serializer->normalize($object->getHostConfig(), 'raw', $context));
        }
        if (null !== $object->getHostnamePath()) {
            $data->{'HostnamePath'} = $object->getHostnamePath();
        }
        if (null !== $object->getHostsPath()) {
            $data->{'HostsPath'} = $object->getHostsPath();
        }
        if (null !== $object->getLogPath()) {
            $data->{'LogPath'} = $object->getLogPath();
        }
        if (null !== $object->getId()) {
            $data->{'Id'} = $object->getId();
        }
        if (null !== $object->getImage()) {
            $data->{'Image'} = $object->getImage();
        }
        if (null !== $object->getMountLabel()) {
            $data->{'MountLabel'} = $object->getMountLabel();
        }
        if (null !== $object->getName()) {
            $data->{'Name'} = $object->getName();
        }
        if (null !== $object->getNetworkSettings()) {
            $data->{'NetworkSettings'} = json_decode($this->serializer->normalize($object->getNetworkSettings(), 'raw', $context));
        }
        if (null !== $object->getPath()) {
            $data->{'Path'} = $object->getPath();
        }
        if (null !== $object->getProcessLabel()) {
            $data->{'ProcessLabel'} = $object->getProcessLabel();
        }
        if (null !== $object->getResolvConfPath()) {
            $data->{'ResolvConfPath'} = $object->getResolvConfPath();
        }
        if (null !== $object->getRestartCount()) {
            $data->{'RestartCount'} = $object->getRestartCount();
        }
        if (null !== $object->getState()) {
            $data->{'State'} = json_decode($this->serializer->normalize($object->getState(), 'raw', $context));
        }
        $value_2 = $object->getMounts();
        if (is_array($object->getMounts())) {
            $values_1 = [];
            foreach ($object->getMounts() as $value_3) {
                $values_1[] = $value_3;
            }
            $value_2 = $values_1;
        }
        if (is_null($object->getMounts())) {
            $value_2 = $object->getMounts();
        }
        $data->{'Mounts'} = $value_2;

        return json_encode($data);
    }
}
