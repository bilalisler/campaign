<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181020204412 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE fos_user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE campaigns DROP FOREIGN KEY campaign_category_property');
        $this->addSql('ALTER TABLE campaigns DROP FOREIGN KEY campaign_condition_property');
        $this->addSql('ALTER TABLE campaigns DROP FOREIGN KEY campaign_product_property');
        $this->addSql('ALTER TABLE campaigns DROP FOREIGN KEY campaign_shop_property');
        $this->addSql('ALTER TABLE campaigns DROP campaign_photo, CHANGE product_id product_id INT DEFAULT NULL, CHANGE category_id category_id INT DEFAULT NULL, CHANGE shop_id shop_id INT DEFAULT NULL, CHANGE condition_id condition_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE campaigns ADD CONSTRAINT FK_E373747012469DE2 FOREIGN KEY (category_id) REFERENCES categories (id)');
        $this->addSql('ALTER TABLE campaigns ADD CONSTRAINT FK_E3737470887793B6 FOREIGN KEY (condition_id) REFERENCES campaign_condition (id)');
        $this->addSql('ALTER TABLE campaigns ADD CONSTRAINT FK_E37374704584665A FOREIGN KEY (product_id) REFERENCES products (id)');
        $this->addSql('ALTER TABLE campaigns ADD CONSTRAINT FK_E37374704D16C4DD FOREIGN KEY (shop_id) REFERENCES shop_profile (id)');
        $this->addSql('ALTER TABLE campaign_condition CHANGE conditions conditions JSON NOT NULL COMMENT \'(DC2Type:json_array)\'');
        $this->addSql('ALTER TABLE products DROP FOREIGN KEY brand_property');
        $this->addSql('ALTER TABLE products DROP FOREIGN KEY category_property');
        $this->addSql('ALTER TABLE products DROP FOREIGN KEY shop_property');
        $this->addSql('ALTER TABLE products CHANGE shop_id shop_id INT DEFAULT NULL, CHANGE brand_id brand_id INT DEFAULT NULL, CHANGE category_id category_id INT DEFAULT NULL, CHANGE stock stock SMALLINT DEFAULT NULL, CHANGE isDelete isDelete TINYINT(1) NOT NULL');
        $this->addSql('ALTER TABLE products ADD CONSTRAINT FK_B3BA5A5A44F5D008 FOREIGN KEY (brand_id) REFERENCES products_brands (id)');
        $this->addSql('ALTER TABLE products ADD CONSTRAINT FK_B3BA5A5A12469DE2 FOREIGN KEY (category_id) REFERENCES categories (id)');
        $this->addSql('ALTER TABLE products ADD CONSTRAINT FK_B3BA5A5A4D16C4DD FOREIGN KEY (shop_id) REFERENCES shop_profile (id)');
        $this->addSql('ALTER TABLE categories ADD lang_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE messages CHANGE shop_id shop_id INT DEFAULT NULL, CHANGE product_id product_id INT DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE fos_user');
        $this->addSql('ALTER TABLE campaign_condition CHANGE conditions conditions TEXT NOT NULL COLLATE utf8_general_ci');
        $this->addSql('ALTER TABLE campaigns DROP FOREIGN KEY FK_E373747012469DE2');
        $this->addSql('ALTER TABLE campaigns DROP FOREIGN KEY FK_E3737470887793B6');
        $this->addSql('ALTER TABLE campaigns DROP FOREIGN KEY FK_E37374704584665A');
        $this->addSql('ALTER TABLE campaigns DROP FOREIGN KEY FK_E37374704D16C4DD');
        $this->addSql('ALTER TABLE campaigns ADD campaign_photo VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8_general_ci, CHANGE category_id category_id INT DEFAULT NULL, CHANGE condition_id condition_id INT DEFAULT NULL, CHANGE product_id product_id INT DEFAULT NULL, CHANGE shop_id shop_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE campaigns ADD CONSTRAINT campaign_category_property FOREIGN KEY (category_id) REFERENCES categories (id) ON UPDATE CASCADE ON DELETE SET NULL');
        $this->addSql('ALTER TABLE campaigns ADD CONSTRAINT campaign_condition_property FOREIGN KEY (condition_id) REFERENCES campaign_condition (id) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('ALTER TABLE campaigns ADD CONSTRAINT campaign_product_property FOREIGN KEY (product_id) REFERENCES products (id) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('ALTER TABLE campaigns ADD CONSTRAINT campaign_shop_property FOREIGN KEY (shop_id) REFERENCES shop_profile (id) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('ALTER TABLE categories DROP lang_id');
        $this->addSql('ALTER TABLE messages CHANGE product_id product_id INT NOT NULL, CHANGE shop_id shop_id INT NOT NULL');
        $this->addSql('ALTER TABLE products DROP FOREIGN KEY FK_B3BA5A5A44F5D008');
        $this->addSql('ALTER TABLE products DROP FOREIGN KEY FK_B3BA5A5A12469DE2');
        $this->addSql('ALTER TABLE products DROP FOREIGN KEY FK_B3BA5A5A4D16C4DD');
        $this->addSql('ALTER TABLE products CHANGE brand_id brand_id INT DEFAULT NULL, CHANGE category_id category_id INT NOT NULL, CHANGE shop_id shop_id INT NOT NULL, CHANGE stock stock SMALLINT DEFAULT 0, CHANGE isDelete isDelete TINYINT(1) DEFAULT \'0\' NOT NULL');
        $this->addSql('ALTER TABLE products ADD CONSTRAINT brand_property FOREIGN KEY (brand_id) REFERENCES products_brands (id) ON UPDATE CASCADE ON DELETE SET NULL');
        $this->addSql('ALTER TABLE products ADD CONSTRAINT category_property FOREIGN KEY (category_id) REFERENCES categories (id) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('ALTER TABLE products ADD CONSTRAINT shop_property FOREIGN KEY (shop_id) REFERENCES shop_profile (id) ON UPDATE CASCADE ON DELETE CASCADE');
    }
}
