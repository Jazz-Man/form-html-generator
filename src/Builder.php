<?php

namespace FormManager;

/**
 * Factory class to create all elements.
 *
 * @method static Fields\Email email()
 * @method static Fields\Checkbox checkbox()
 * @method static Fields\Color color()
 * @method static Fields\Date date()
 * @method static Fields\Datetime datetime()
 * @method static Fields\DatetimeLocal datetimeLocal()
 * @method static Fields\File file()
 * @method static Fields\Hidden hidden()
 * @method static Fields\Html html()
 * @method static Fields\Month month()
 * @method static Fields\Number number()
 * @method static Fields\Password password()
 * @method static Fields\Radio radio()
 * @method static Fields\Range range()
 * @method static Fields\Search search()
 * @method static Fields\Select select()
 * @method static Fields\Textarea textarea()
 * @method static Fields\Time time()
 * @method static Fields\Tel tel()
 * @method static Fields\Text text()
 * @method static Fields\Url url()
 * @method static Fields\Submit submit()
 * @method static Fields\Week week()
 *
 *
 *
 * @method static Fields\Form form(array $children = null)
 * @method static Fields\Group group(array $children = null)
 * @method static Fields\Loader loader(array $children = null)
 * @method static Fields\Choose choose(array $children = null)
 * @method static Fields\Collection collection(array $children = null)
 * @method static Fields\CollectionMultiple collectionMultiple(array $children = null)
 */
class Builder
{
	protected static $factories = [];
	protected $instanceFactories = [];

	/**
	 * Add a factory class to the builder.
	 *
	 * @param FactoryInterface $factory
	 */
	public static function addFactory(FactoryInterface $factory)
	{
		array_unshift(static::$factories, $factory);
	}

	/**
	 * Constructor to use the Builder as a instance mode, instead static mode.
	 *
	 * @param FactoryInterface|null $factory $factory
	 */
	public function __construct(FactoryInterface $factory = null)
	{
		if ($factory !== null) {
			$this->add($factory);
		}
	}

	/**
	 * Magic method to create instances using the API Builder::whatever().
	 *
	 * @param string $name
	 * @param array  $arguments
	 *
	 * @return null|ElementInterface
	 * @throws \ReflectionException
	 */
	public static function __callStatic($name, $arguments)
	{
		/** @var \FormManager\Factory $factory */
		foreach (self::$factories as $factory) {
			if (($item = $factory->get($name, $arguments)) !== null) {
				return $item;
			}
		}
	}

	/**
	 * Magic method to create instances using the API $builder->whatever().
	 *
	 * @param string $name
	 * @param array  $arguments
	 *
	 * @return null|ElementInterface
	 */
	public function __call($name, $arguments)
	{
		foreach ($this->instanceFactories as $factory) {
			if (($item = $factory->get($name, $arguments)) !== null) {
				return $item;
			}
		}
	}

	/**
	 * Add a factory class to the builder.
	 *
	 * @param FactoryInterface $factory
	 */
	public function add(FactoryInterface $factory)
	{
		array_unshift($this->instanceFactories, $factory);
	}
}

//Add the form-manager factory by default
Builder::addFactory(new Factory());
