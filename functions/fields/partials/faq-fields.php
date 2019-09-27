<?php
use StoutLogic\AcfBuilder\FieldsBuilder;

class FAQ_Fields {
	public function get_fields() {
		$faq_fields = new FieldsBuilder('faq_fields');

		return $faq_fields
			->addText('faqs_title', [
				'label' => 'Title',
			])

			->addRepeater('faqs', [
				'button_label' => 'Add FAQs',
				'label' => 'FAQs',
			])
				->addPostObject('faq', [
					'label' => 'FAQ',
					'post_type' => [
						0 => 'faq',
					]
				])
				->setRequired()
			->endRepeater();
	}
}
